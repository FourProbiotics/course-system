<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:58
 */
namespace App\Http\Controllers\Account;

use DB;
use Auth;
use Config;
use App\User;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class mainController extends Controller
{

    /**
     * 返回profile视图,个人资料页面
     */
    public function profile()
    {

        return view('account.profile');
    }

    /**
     * 修改密码视图
     */
    public function change_password(Request $request)
    {

        return view('account.change_password');
    }

}