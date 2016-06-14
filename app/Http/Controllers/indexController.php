<?php
/**
 * Created by PhpStorm.
 * User: cran
 * Date: 2016/5/30
 * Time: 15:47
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = model('course')->get_courses_list(0, 50);
        $announces = model('announce')->get_announces_list(0, 50);
        return view('index', ['courses' => $courses, 'announces' => $announces]);
    }
}
