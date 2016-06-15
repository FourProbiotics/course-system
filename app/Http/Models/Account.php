<?php

namespace App\Http\Models;

use DB;
use App\User;
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

    /**
     * 检查unos是否都存在,都存在返回false
     *
     * @param array
     * @return boolean
     */
    public function exist_error_unos($unos)
    {
        if(!is_array($unos))
        {
            return true;
        }
        $error = array();
        foreach ($unos as $key => $val)
        {
            if(!$this->check_uno($val))
            {
                $error[] = $val;
            }
        }
        return $error;
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
     * 用户密码验证
     *
     * @param string
     * @param string
     * @return boolean
     */
    public function reset_password($uno, $password)
    {
        $uid = $this->get_uid_by_uno($uno);
        return $this->update_users_fields([
            'password' => bcrypt($password),
        ], $uid);
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

        if ($uid = DB::table('users')->select('id')->where('email', $email)->first()) {
            return $this->get_user_info_by_uid($uid);
        }

        return $uid;
    }

    /**
     * 通过 uid 获取用户信息
     *
     * $cache_result 为是否缓存结果
     *
     * @param string
     * @return object
     */
    public function get_user_info_by_uid($uid)
    {
        if (!$uid) {
            return false;
        }

        if ($uid == -1) {
            return false;
        }

        if (!$user_info = DB::table('users')->where('id', floatval($uid))->first()) {
            return false;
        } else {
            $user_info->uid = $user_info->id;

            if (!$user_info->name) {
                $user_info->name = $user_info->uno;
            }

            unset($user_info->password);
        }

        return $user_info;
    }

    /**
     * 通过 UID 数组获取用户信息
     *
     * @param array
     * @return array
     */
    public function get_user_info_by_uids($uids)
    {
        if (!is_array($uids) OR sizeof($uids) == 0) {
            return false;
        }

        array_walk_recursive($uids, 'intval_string');

        $uids = array_unique($uids);

        if (sizeof($uids) == 1) {
            if ($one_user_info = $this->get_user_info_by_uid(end($uids))) {
                return array(
                    end($uids) => $one_user_info
                );
            }

        }

        if ($user_info = DB::table('users')->whereIn('id', $uids)->get()) {
            foreach ($user_info as $key => $val) {
                $val->uid = $val->id;
                if (!$val->name) {
                    $val->name = $val->uno;
                }
                $user_list[$val->uid] = $val;
            }
        }

        return $user_info;
    }

    /**
     * 通过 UNOS 数组获取UIDS
     *
     * @param array
     * @return array
     */
    public function get_uids_by_unos($unos)
    {
        if (!is_array($unos) OR sizeof($unos) == 0) {
            return false;
        }

        $unos = array_unique($unos);

        if ($user_info = DB::table('users')->whereIn('uno', $unos)->get()) {
            foreach ($user_info as $key => $val) {
                $uids[] = $val->id;
            }
        }

        return $uids;
    }

    /**
     * 通过 UNOS 数组获取UIDS
     *
     * @param integer
     * @return integer
     */
    public function get_uid_by_uno($uno)
    {
        if (!$uno) {
            return false;
        }

        if ($user_info = DB::table('users')->where('uno', $uno)->first()) {
            return $user_info->id;
        }

        return false;
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
    public function delete_avatar($uid)
    {
        if (!$uid) {
            return false;
        }

        foreach (config('cr.avatar_thumbnail') as $key => $val) {
            @unlink(base_path('public/uploads') . '/avatar/' . $this->get_avatar($uid, $key, 1) . $this->get_avatar($uid, $key, 2));
        }

        return $this->update_users_fields(array('avatar_file' => ''), $uid);
    }

    /**
     * 更新用户表字段
     *
     * @param array
     * @param uid
     * @return int
     */
    public function update_users_fields($update_data, $uid)
    {
        return DB::table('users')
            ->where('id', floatval($uid))
            ->update($update_data);
    }

    public function remove_user_by_uid($uid)
    {
        if ($user_info = $this->get_user_info_by_uid($uid)) {
            DB::table('users')->where('id', intval($uid))->delete();
            //删除相关信息，以后再说
        }

        return true;
    }

    public function get_all_uids()
    {
        $ids = DB::table('users')->select('id')->get();
        $uids = array();
        foreach ($ids as $key=> $val)
        {
            $uids[] = $val->id;
        }

        return $uids;
    }

    public function get_all_users($page = 0, $per_page = 50)
    {
        $posts_index = DB::table('users')->skip(intval($page) * intval($per_page))->take(intval($per_page))->orderBy('id', 'desc')->get();

        return $posts_index;
    }

    public function get_user_list_by_course_id($course_id)
    {
        $group_list = model('group')->get_group_list_by_course_id($course_id);
        $uids = array();
        foreach ($group_list as $key => $val)
        {
            foreach ($val->member as $k => $v)
            {
                $uids[] = $v->id;
            }
        }

        $uids = array_unique($uids);
        sort($uids);

        return $this->get_user_info_by_uids($uids);
    }

    public function add_user($uno, $password, $name = '', $group_id = 0, $email = '', $college = '', $class = '', $mobile = '')
    {
        return User::create([
            'uno' => $uno,
            'password' => bcrypt($password),
            'name' => $name,
            'group_id' => intval($group_id),
            'college' => $college,
            'class' => $class,
            'email' => $email,
            'mobile' => $mobile,
            'last_login' => date('Y-m-d H:i:s', time()),
        ]);
    }


}
