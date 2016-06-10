<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/6/2
 * Time: 13:41
 */
namespace App\Http\Controllers\Admin;

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
     * 返回admin设置视图
     */
    public function setting()
    {

        return view('admin.setting');
    }

    /**
     * 返回admin消息视图
     */
    public function messages()
    {

        return view('admin.messages');
    }

    /**
     * 返回admin新建消息视图
     */
    public function message_new()
    {

        return view('admin.message_new');
    }

    /**
     * 返回admin课程视图
     */
    public function courses()
    {

        return view('admin.courses');
    }

    /**
     * 返回admin课程视图
     */
    public function course_new()
    {

        return view('admin.course_new');
    }

    /**
     * 返回admin编辑课程视图
     */
    public function course_edit()
    {

        return view('admin.course_edit');
    }

    /**
     * 返回admin课程学生视图
     */
    public function course_students()
    {

        return view('admin.students');
    }

    /**
     * 返回admin作业视图
     */
    public function homework()
    {

        return view('admin.homework');
    }

    /**
     * 返回admin新建作业视图
     */
    public function homework_new()
    {

        return view('admin.homework_new');
    }

    /**
     * 返回admin作业编辑视图
     */
    public function homework_edit()
    {

        return view('admin.homework_edit');
    }

    /**
     * 返回admin作业详情视图
     */
    public function homework_detail()
    {

        return view('admin.homework_detail');
    }

    /**
     * 返回admin作业评分视图
     */
    public function homework_marking()
    {

        return view('admin.homework_marking');
    }

    /**
     * 返回admin资源视图
     */
    public function resources()
    {

        return view('admin.resources');
    }

    /**
     * 返回admin新建资源视图
     */
    public function resource_new()
    {

        return view('admin.resource_new');
    }

    /**
     * 返回admin新建资源视图
     */
    public function resource_edit()
    {

        return view('admin.resource_edit');
    }

    /**
     * 返回admin公告视图
     */
    public function announces()
    {

        return view('admin.announces');
    }

    /**
     * 返回admin公告视图
     */
    public function announce_new()
    {

        return view('admin.announce_new');
    }

    /**
     * 返回admin公告视图
     */
    public function announce_edit()
    {

        return view('admin.announce_edit');
    }

    /**
     * 返回admin学生视图
     */
    public function students()
    {

        return view('admin.students');
    }

    /**
     * 返回admin新建学生视图
     */
    public function student_new()
    {

        return view('admin.student_new');
    }

    /**
     * 返回admin导入学生视图
     */
    public function student_import()
    {

        return view('admin.student_import');
    }

    /**
     * 返回admin新建学生视图
     */
    public function student_edit()
    {

        return view('admin.student_edit');
    }

    /**
     * 返回admin评论视图
     */
    public function comments()
    {

        return view('admin.comments');
    }

    /**
     * 返回admin评论视图
     */
    public function comment_reply()
    {

        return view('admin.comment_reply');
    }


}