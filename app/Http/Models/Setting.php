<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function get_settings()
    {
        if ($system_setting = DB::table('system_setting')->get()) {
            foreach ($system_setting as $key => $val) {
                $settings[$val->varname] = unserialize($val->value);
            }
        }

        return $settings;
    }

    public function get_setting($varname)
    {
        $result = DB::table('system_setting')->select('value')->where('varname', $varname)->first();

        return unserialize($result->value);
    }

    public function set_vars($vars)
    {
        if (!is_array($vars)) {
            return false;
        }

        foreach ($vars as $key => $val) {
            DB::table('system_setting')->where('varname', $key)->update(array(
                'value' => serialize($val)
            ));
        }

        return true;
    }
}
