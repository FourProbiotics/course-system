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

        $announces = model('announce')->get_announces_list(0, 50);
        return view('announces.index', ['announces' => $announces]);
    }

    /**
     *公告页面
     */
    public function announce($id)
    {
        $announce = model('announce')->get_announce_info_by_id($id);

        return view('announces.detail', [
            'announce' => $announce,
        ]);
    }

}