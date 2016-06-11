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
        return Auth::user()->group_id == 1;
    }
}