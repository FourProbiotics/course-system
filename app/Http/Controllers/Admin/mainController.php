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
use Validator;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return Redirect::route('admin::setting');
    }

    /**
     * 返回admin设置视图
     */
    public function setting()
    {
        $site_name = setting('site_name');
        return view('admin.setting', ['site_name' => $site_name]);
    }

    public function setting_post(Request $request)
    {
        $site_name = $request->get('site_name');
        model('setting')->set_vars([
            'site_name' => $site_name,
        ]);
        return Redirect::route('admin::setting')
            ->withErrors('提交成功！')
            ->withInput();
    }

    /**
     * 返回admin消息视图
     */
    public function messages()
    {
        $messages = model('message')->get_message_list();
        foreach ($messages as $key => $val)
        {
            $val->recipient_user = model('account')->get_user_info_by_uids(unserialize($val->recipient_uid));
        }
        //var_dump($messages);
        return view('admin.messages', [
            'messages'=> $messages,
        ]);
    }

    /**
     * 返回admin新建消息视图
     */
    public function message_new()
    {
        $group_list = model('group')->get_group_list();
        return view('admin.message_new', [
            'group_list' => $group_list
        ]);
    }

    public function message_new_post(Request $request)
    {
        $title = $request->get('title');
        $content = $request->get('content');
        $user_uids = array();
        $group_uids = array();

        if($users = $request->get('user'))
        {
            $users = explode(',', $users);
            if($error = model('account')->exist_error_unos($users))
            {
                return Redirect::back()
                    ->withErrors('下列用户不存在: '.implode(" ",$error))
                    ->withInput();
            }
            $user_uids = model('account')->get_uids_by_unos($users);
        }

        if($group = $request->get('group'))
        {
            if($group[0] == 'all')
            {
                $uids = model('account')->get_all_uids();
                model('message')->send_message(Auth::user()->id, $uids, $title, $content);
                return Redirect::route('admin::messages')
                    ->withErrors('提交成功！');
            }
            $group_uids = model('group')->get_member_uids_by_group_ids($group);
        }

        $uids = array_unique(array_merge($user_uids, $group_uids));

        //model('notification')->send_all(Auth::user()->id, $uids, $title, $content);
        model('message')->send_message(Auth::user()->id, $uids, $title, $content);

        return Redirect::route('admin::messages')
            ->withErrors('提交成功！');
    }

    /**
     * 返回admin课程视图
     */
    public function courses()
    {
        $course_list = model('course')->get_courses_list(0,200);
        return view('admin.courses', [
            'course_list' => $course_list,
        ]);
    }

    /**
     * 返回admin课程视图
     */
    public function course_new()
    {

        return view('admin.course_new');
    }

    public function course_new_post(Request $request)
    {
        $name = $request->get('name');
        $teacher = $request->get('teacher');
        $college = $request->get('college');
        $term = $request->get('term');
        $content = $request->get('content');
        $teach_outline = $request->get('teach_outline');
        $teach_plan = $request->get('teach_plan');

        if(!$name || !$teacher ||!$college ||!$term)
        {
            return Redirect::back()
                ->withErrors('名称、教师、学院、学期必须填写')
                ->withInput();
        }
        
        if(!model('course')->save_course($name, $content, $term, $teach_outline, $teach_plan, $college, $teacher))
        {
            return Redirect::back()
                ->withErrors('添加失败')
                ->withInput();
        }
        
        return Redirect::route('admin::courses');
    }

    /**
     * 返回admin编辑课程视图
     */
    public function course_edit($course_id)
    {
        $course_info = model('course')->get_course_info_by_id($course_id);
        return view('admin.course_edit', [
            'course_info' => $course_info,
        ]);
    }

    public function course_edit_post($course_id, Request $request)
    {
        $name = $request->get('name');
        $teacher = $request->get('teacher');
        $college = $request->get('college');
        $term = $request->get('term');
        $content = $request->get('content');
        $teach_outline = $request->get('teach_outline');
        $teach_plan = $request->get('teach_plan');

        if(!$name || !$teacher ||!$college ||!$term)
        {
            return Redirect::back()
                ->withErrors('名称、教师、学院、学期必须填写')
                ->withInput();
        }
        
        $course_info = model('course')->update_course($course_id, $name, $content, $term, $teach_outline, $teach_plan, $college, $teacher);

        return Redirect::route('admin::courses');
    }

    /**
     * 返回admin课程学生视图
     */
    public function course_students($course_id)
    {
        $user_list = model('account')->get_user_list_by_course_id($course_id);
        return view('admin.students', [
            'user_list' => $user_list,
        ]);
    }

    /**
     * 返回admin课程学生视图
     */
    public function course_groups($course_id)
    {
        $group_list = model('group')->get_group_list_by_course_id($course_id);
        $course_info = model('course')->get_course_info_by_id($course_id);
        return view('admin.groups',[
            'group_list' => $group_list,
            'course_info' => $course_info,
        ]);
    }

    /**
     * 返回admin作业视图
     */
    public function homework()
    {
        $homework_list = model('homework')->get_homework_list(0,200);
        foreach ($homework_list as $key => $val)
        {
            $answer = model('answer')->get_answer_list_by_homework_id($val->homework_id);
            $answer_has_read = model('answer')->get_answer_list_by_homework_id($val->homework_id, 0);
            $val->marking_status = count($answer_has_read).'/'.count($answer);
        }

        return view('admin.homework', [
            'homework_list'=> $homework_list,
        ]);
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
    public function homework_answer($homework_id)
    {
        $answer_list = model('answer')->get_answer_list_by_homework_id($homework_id);
        return view('admin.homework_answer', [
            'answer_list' => $answer_list,
        ]);
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
    public function announce_edit($id)
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
        $courses = DB::table('courses')->count();
        $comments = array();
        for($i = 1;$i <= $courses;$i++){
            $temp = model('comment')->get_comment_list_by_course_id($i);
            foreach($temp as $k=>$v)
            {
                array_push($comments, $v);
            }
        }

        return view('admin.comments', ['comments' => $comments]);
    }

    /**
     * 返回admin评论视图
     */
    public function comment_reply()
    {

        return view('admin.comment_reply');
    }

    /**
     * 返回分组视图
     */
    public function groups()
    {

        return view('admin.groups');
    }

    /**
     * 返回分组编辑视图
     */
    public function groups_edit()
    {

        return view('admin.groups_edit');
    }

}