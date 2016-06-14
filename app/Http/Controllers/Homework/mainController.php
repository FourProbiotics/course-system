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
        $homework->resource = model('resource')->get_resource('homework', $homework->homework_id);
        return view('homework.submit', [
            'homework' => $homework,
        ]);
    }
}