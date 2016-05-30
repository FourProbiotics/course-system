<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/28
 * Time: 15:32
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


class loginController extends Controller
{

    /**
     * 返回login视图,登录页面
     */
    public function loginGet()
    {
        $user = DB::table('users')->where('uno', floatval('201319630201'))->get();
        //var_dump($user);
        //var_dump(($user[0]->uno));
        //var_dump(Config::set('test.config','value'));
        //var_dump(base_path('uploads'));
        //var_dump(Auth::attempt(['uno' => $user->uno, 'password' => '127555crd'],false, false));
        return view('account.login');
    }

    /**
     * 登录响应
     */
    public function loginPost(Request $request)
    {
        $this->validate($request, User::rules());
        $uno = $request->get('uno');
        $password = $request->get('password');
        if (Auth::attempt(['uno' => $uno, 'password' => $password], $request->get('remember'))) {
            //return Redirect::action('HomeController@index');
            return view('home');
        } else {
            return Redirect::route('login')
                ->withErrors('学号或者密码不正确，请重试！')
                ->withInput();
        }
    }

    /**
     * 用户登出
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::route('login');
    }
}