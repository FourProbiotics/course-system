<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:58
 */
namespace App\Http\Controllers\Courses;

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
     * 课程列表页面
     */
    public function index()
    {

        return view('courses.index');
    }

    /**
     * 课程页面
     */
    public function course($id)
    {
        $course_info = DB::table('courses')->where('course_id', floatval($id))->first();
        return view('courses.detail');
    }

}