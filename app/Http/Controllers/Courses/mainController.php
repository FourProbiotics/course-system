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

use DB;

class mainController extends Controller
{

    /**
     * 课程列表页面
     */
    public function index()
    {
        $courses = model('course')->get_courses_list(0, 50);
        //var_dump($course_list);
        return view('courses.index', ['courses' => $courses,]);
    }
    /**
     * 课程页面
     */
    public function course($id)
    {
        $course_info = model('course')->get_course_info_by_id($id);
        if (!$course_info) {
            return response('找不到课程.', 401);
        }
        $resource = model('resource')->get_resource('course', $id);
        $comments = model('comment')->get_comment_list_by_course_id($id);
        return view('courses.detail', [
            'course_info' => $course_info,
            'resource' => $resource,
            'comments' => $comments,
        ]);
    }

    public function course_post($id, Request $request)
    {
        if(Auth::guest())
        {
            return Redirect::route('login')
                ->withErrors('请先登录')
                ->withInput();
        }

        $content = $request->get('content');
        
        if(!$content)
        {
            return Redirect::route('course_detail', ['id' => $id])
                ->withErrors('评论不能为空')
                ->withInput();
        }

        model('comment')->save_comment($id, $content, Auth::user()->id);

        return Redirect::route('course_detail', ['id' => $id]);
    }

}