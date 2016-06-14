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
use Illuminate\Support\Facades\Redirect;
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
        $uid = Auth::user()->id;
        $user_info = model('account')->get_user_info_by_uid($uid);
        return view('account.profile', ['user_info' => $user_info]);
    }

    /**
     * 修改密码视图
     */
    public function change_password()
    {
        //model('account')->reset_password(Auth::user()->uno, 'admin');
        return view('account.change_password');
    }

    public function reset_password(Request $request)
    {
        $old_password = $request->get('old_password');
        $new_password = $request->get('new_password');
        $confirm_password = $request->get('confirm_password');
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($new_password != $confirm_password) {
            return Redirect::route('change_password')
                ->withErrors('两次密码不一致！')
                ->withInput();
        }

        if (Auth::attempt(['uno' => Auth::user()->uno, 'password' => $old_password])) {
            model('account')->reset_password(Auth::user()->uno, $new_password);
            return Redirect::route('change_password')
                ->withErrors('重置密码成功！')
                ->withInput();
        } else {
            return Redirect::route('change_password')
                ->withErrors('旧密码不正确，请重试！')
                ->withInput();
        }

    }

}