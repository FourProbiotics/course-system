<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:58
 */
namespace App\Http\Controllers\Courses;

use App\Http\Models\M;
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
        $course_list = M::model('Course')->get_course_info_by_ids([1, 2]);
        //var_dump($course_list);
        return view('courses.index', [$course_list]);
    }

    /**
     * 课程页面
     */
    public function course($id)
    {
        //$course_info = DB::table('courses')->where('course_id', floatval($id))->first();
        return view('courses.detail');
    }

}