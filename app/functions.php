<?php
use \App\Http\Models\M;
use App\User;

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