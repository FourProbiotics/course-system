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
        $group_id = Auth::user()->group_id;
        $group_info = model('group')->get_group_info_by_id($group_id);

        $course = model('course')->get_course_info_by_id($group_info->group->course_id);

        $group_list = model('group')->get_group_list_by_course_id($group_info->group->course_id);
        $member_count = 0;
        foreach ($group_list as $key => $val) {
            $member_count += $val->member_count;
        }
        $course->member_count = $member_count;
        $course->resource_count = count(model('resource')->get_resource('course', $group_info->group->course_id));
        $course->homework_count = count(model('homework')->get_homework_list_by_course_id($group_info->group->course_id));
        $course->answer_count = count(model('answer')->get_answer_list_by_course_id($group_info->group->course_id, Auth::user()->id));
        return view('home.courses', ['course' => $course]);
    }

    /**
     * 个人作业视图
     */
    public function homework(Request $request)
    {
        $homework_list = model('homework')->get_homework_list_by_uid(Auth::user()->id);
        //var_dump($homework_list);
        return view('home.homework', [
            'homework_list' => $homework_list,
        ]);
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