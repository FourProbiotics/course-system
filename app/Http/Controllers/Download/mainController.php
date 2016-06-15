<?php
namespace App\Http\Controllers\Download;

use Auth;
use Config;
use App\User;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class mainController extends Controller
{
    public function index($id)
    {
        if (Auth::guest()) {
            return response('Unauthorized.', 401);
        }
        $resource = model('resource')->get_resource_by_id($id);
        return response()->download(public_path() . '/uploads/' . $resource->item_type . '/' . gmdate('Ymd', time($resource->add_time)) . '/' . $resource->file_location, $resource->file_name);
    }

}