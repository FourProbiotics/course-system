<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:58
 */
namespace App\Http\Controllers\Homework;

use core_upload;
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
        $homework = model('homework')->get_homework_info_by_id($id);
        $homework->course_info = model('course')->get_course_info_by_id($homework->course_id);
        $homework->resource = model('resource')->get_resource('homework', $homework->homework_id);
        return view('homework.detail', [
            'homework' => $homework,
        ]);
    }

    /**
     * 作业提交页面
     */
    public function submit($id)
    {
        $homework = model('homework')->get_homework_info_by_id($id);
        $homework->course_info = model('course')->get_course_info_by_id($homework->course_id);

        if ($answer = model('answer')->get_answer_by_uid(Auth::user()->id, $id)) {
            $answer->resource = model('resource')->get_resource('answer', $answer->answer_id);
        }

        var_dump($answer);

        return view('homework.submit', [
            'homework' => $homework,
            'answer' => $answer,
        ]);
    }

    public function submit_post($id, Request $request)
    {
        $upload = new core_upload();

        $upload->initialize(array(
            'allowed_types' => get_config('allowed_upload_types'),
            'upload_path' => base_path('public/uploads') . '/answer/' . gmdate('Ymd'),
            'is_image' => TRUE,
            'max_size' => 1024 * 10,
        ));
        $upload->do_upload('file');

        if ($upload->get_error()) {
            return Redirect::route('homework_submit', ['id' => $id])
                ->withErrors($upload->get_error())
                ->withInput();
        }

        if (!$upload_data = $upload->data()) {
            return Redirect::route('homework_submit', ['id' => $id])
                ->withErrors('上传失败，请与管理员联系')
                ->withInput();
        }

        if (model('answer')->get_answer_by_uid(Auth::user()->id, $id)) {
            return Redirect::route('homework_submit', ['id' => $id])
                ->withErrors('你已经提交过这个作业')
                ->withInput();

        }
        $answer_id = model('answer')->save_answer($id, $request->get('content'), Auth::user()->id);

        model('resource')->add_resource('answer', $request->get('content'), $upload_data['orig_name'], basename($upload_data['full_path']), $answer_id, $upload_data['is_image']);


        return Redirect::route('home_homework');
    }
}