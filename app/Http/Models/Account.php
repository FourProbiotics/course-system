<?php

namespace App\Http\Models;

use DB;
use Auth;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * 检查用户名是否已经存在
     *
     * @param string
     * @return boolean
     */
    public function check_uno($uno)
    {
        $uno = trim($uno);

        return DB::table('users')->where('uno', $uno)->orWhere('remember_token', $uno)->first();
    }

    /*
     * 邮箱验证
     * @param string
     * @return boolean
     */
    public function valid_email($email)
    {
        return preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email);
    }


    /**
     * 检查电子邮件地址是否已经存在
     *
     * @param string
     * @return boolean
     */
    public function check_email($email)
    {
        if (!$this->valid_email($email)) {
            return TRUE;
        }

        return DB::table('users')->select('uno')->where('email', $email)->first();
    }

    /**
     * 过滤数字字符串
     *
     * @param string
     * @return boolean
     */
    public static function intval_string(&$value)
    {
        if (!is_numeric($value)) {
            $value = floatval($value);
        }
    }

    /**
     * 用户登录验证
     *
     * @param string
     * @param string
     * @return object
     */
    public function check_login($uno, $password)
    {
        if (!$uno OR !$password) {
            return false;
        }

        if ($this->valid_email($uno)) {
            $user_info = $this->get_user_info_by_email($uno);
        }

        if (!$user_info) {
            if (!$user_info = $this->get_user_info_by_uno($uno)) {
                return false;
            }
        }

        if (!$this->check_password($uno, $password)) {
            return false;
        } else {
            return $user_info;
        }

    }

    /**
     * 用户密码验证
     *
     * @param string
     * @param string
     * @return boolean
     */
    public function check_password($uno, $password)
    {
        return Auth::attempt(['uno' => $uno, 'password' => $password], false, false);
    }

    /**
     * 通过用户邮箱获取用户信息
     *
     * @param string
     * @return object
     */
    public function get_user_info_by_email($email)
    {
        if (!$this->valid_email($email)) {
            return false;
        }

        if ($uno = DB::table('users')->select('uno')->where('email', $email)->first()) {
            return $this->get_user_info_by_uno($uno);
        }

        return $uno;
    }

    /**
     * 通过 UNO 获取用户信息
     *
     * $cache_result 为是否缓存结果
     *
     * @param string
     * @return object
     */
    public function get_user_info_by_uno($uno)
    {
        if (!$uno) {
            return false;
        }

        if ($uno == -1) {
            return false;
        }

        if (!$user_info = DB::table('users')->where('uno', floatval($uno))->first()) {
            return false;
        }

        return $user_info;
    }

    /**
     * 通过 UID 数组获取用户信息
     *
     * @param array
     * @param boolean
     * @return array
     */
    public function get_user_info_by_unos($unos)
    {
        if (!is_array($unos) OR sizeof($unos) == 0) {
            return false;
        }

        array_walk_recursive($unos, 'intval_string');

        $unos = array_unique($unos);

        if (sizeof($unos) == 1) {
            if ($one_user_info = $this->get_user_info_by_uno(end($unos))) {
                return array(
                    end($unos) => $one_user_info
                );
            }

        }

        static $users_info;

        if ($user_info = DB::table('users')->select('uno')->whereIn('uno', $unos)->get()) {
            foreach ($user_info as $key => $val) {
                unset($val->password);

                $data[$val->uno] = $val;

                $query_unos[] = $val->uno;
            }

            foreach ($unos AS $uno) {
                if ($uno == -1) {
                    $result['-1'] = array(
                        '$uno' => -1,
                        'user_name' => '[已注销]',
                    );
                } else if ($data[$uno]) {
                    $result[$uno] = $data[$uno];
                }
            }

            $users_info[implode('_', $unos)] = $data;
        }

        return $result;
    }

    /**
     * 获取头像地址
     *
     * 举个例子：$uno=20131963021，那么头像路径很可能(根据您部署的上传文件夹而定)会被存储为/uploads/2013/1963/02/01_avatar_min.jpg
     *
     * @param  int
     * @param  string
     * @param  int
     * @return string
     */
    public function get_avatar($uno, $size = 'min', $return_type = 0)
    {
        $size = in_array($size, array(
            'max',
            'mid',
            'min',
            '50',
            '150',
            'big',
            'middle',
            'small'
        )) ? $size : 'real';

        $uno = abs($uno);
        $dir1 = substr($uno, 0, 4);
        $dir2 = substr($uno, 4, 4);
        $dir3 = substr($uno, 8, -2);

        if ($return_type == 1) {
            return $dir1 . '/' . $dir2 . '/' . $dir3 . '/';
        }

        if ($return_type == 2) {
            return substr($uno, -2) . '_avatar_' . $size . '.jpg';
        }

        return $dir1 . '/' . $dir2 . '/' . $dir3 . '/' . substr($uno, -2) . '_avatar_' . $size . '.jpg';
    }

    /**
     * 删除用户头像
     *
     * @param int
     * @return boolean
     */
    public function delete_avatar($uno)
    {
        if (!$uno) {
            return false;
        }

        foreach (config('cr.avatar_thumbnail') as $key => $val) {
            @unlink(base_path('uploads') . '/avatar/' . $this->get_avatar($uno, $key, 1) . $this->get_avatar($uno, $key, 2));
        }

        return $this->update_users_fields(array('avatar_file' => ''), $uno);
    }

    /**
     * 更新用户表字段
     *
     * @param array
     * @param uid
     * @return int
     */
    public function update_users_fields($update_data, $uno)
    {
        return DB::table('users')
            ->where('uno', floatval($uno))
            ->update($update_data);
    }


}
