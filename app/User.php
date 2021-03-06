<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'uno', 'password', 'email',
        'mobile', 'avatar_file', 'sex', 'last_login',
        'update_at', 'group_id', 'name',
        'college', 'class',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 登录验证规则
     * @return [type] [description]
     */
    protected static function rules()
    {
        return [
            'uno' => 'required',
            'password' => 'required'
        ];
    }
}
