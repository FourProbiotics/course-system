<?php
use \App\Http\Models\M;
use App\User;

define('TEMP_PATH', dirname(dirname(__FILE__)) . '/tmp/');
if (!function_exists('setting')) {
    function setting($varname)
    {
        return M::model('Setting')->get_setting($varname);
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        if (!Auth::user()) {
            return false;
        }
        return Auth::user()->group_id == 1;
    }
}

if (!function_exists('model')) {
    function model($model)
    {
        return M::model($model);
    }
}

/**
 * 强制转换字符串为整型, 对数字或数字字符串无效
 *
 * @param  mixed
 */
if (!function_exists('intval_string')) {
    function intval_string(&$value)
    {
        if (!is_numeric($value)) {
            $value = intval($value);
        }
    }
}

if (!function_exists('get_config')) {
    function get_config($config, $file = 'cr')
    {
        return config($file . '.' . $config);
    }
}
if (!function_exists('make_dir')) {
    function make_dir($dir, $permission = 0777)
    {
        $dir = rtrim($dir, '/') . '/';

        if (is_dir($dir)) {
            return TRUE;
        }

        if (!make_dir(dirname($dir), $permission)) {
            return FALSE;
        }

        return @mkdir($dir, $permission);
    }
}
if (!function_exists('is_really_writable')) {
    function is_really_writable($file)
    {
        // If we're on a Unix server with safe_mode off we call is_writable
        if (DIRECTORY_SEPARATOR == '/' and @ini_get('safe_mode') == FALSE) {
            return is_writable($file);
        }

        // For windows servers and safe_mode "on" installations we'll actually
        // write a file then read it.  Bah...
        if (is_dir($file)) {
            $file = rtrim($file, '/') . '/is_really_writable_' . md5(rand(1, 100));

            if (!@file_put_contents($file, 'is_really_writable() test file')) {
                return FALSE;
            } else {
                @unlink($file);
            }

            return TRUE;
        } else if (($fp = @fopen($file, FOPEN_WRITE_CREATE)) === FALSE) {
            return FALSE;
        }

        return TRUE;
    }
}