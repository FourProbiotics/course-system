<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:58
 */
namespace App\Http\Controllers\Homework;

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
     * 作业详情页面
     */
    public function homework($id)
    {
        return view('homework.detail');
    }

    /**
     * 作业提交页面
     */
    public function submit($id)
    {
        return view('homework.submit');
    }
}