<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:58
 */
namespace App\Http\Controllers\Announces;

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
     * 返回公告列表
     */
    public function index()
    {

        return view('announces.index');
    }

    /**
     *公告页面
     */
    public function announce($id)
    {

        return view('announces.detail');
    }

}