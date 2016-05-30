<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:58
 */
namespace App\Http\Controllers\Home;

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
     * 个人课程页面
     */
    public function courses()
    {

        return view('home.courses');
    }

    /**
     * 个人作业视图
     */
    public function homework(Request $request)
    {

        return view('home.homework');
    }

    /**
     * 个人消息视图
     */
    public function messages(Request $request)
    {

        return view('home.messages');
    }

    /**
     * 个人消息详情
     */
    public function message($id)
    {

        return view('home.message');
    }

}