<?php

namespace App\Http\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function add_resource($item_type, $resource_content, $file_name, $file_location, $item_id, $is_image = false)
    {
        if ($is_image) {
            $is_image = 1;
        }
        if ($exist = $this->get_resource($item_type, $item_id)) {
            $this->remove_resource($exist[0]->id);
        }

        return DB::table('resource')->insertGetId(array(
            'file_name' => htmlspecialchars($file_name),
            'resource_content' => $resource_content,
            'add_time' => date('Y-m-d H:i:s', time()),
            'file_location' => htmlspecialchars($file_location),
            //'is_image' => $is_image,
            'item_type' => $item_type,
            'item_id' => $item_id,
        ));
    }


    public function remove_resource($id)
    {
        if (!$resource = $this->get_resource_by_id(intval($id))) {
            return false;
        }
        DB::table('resource')->where('id', intval($id))->delete();

        $resource_dir = base_path('public/uploads') . '/' . $resource->item_type . '/' . gmdate('Ymd', time($resource->add_time))
            . '/' . $resource->file_location;

        @unlink($resource_dir);

        return true;
    }

    public function get_resource_by_id($id)
    {

        if ($resource = DB::table('resource')->where('id', intval($id))->first()) {
            return $resource;
        }

        return false;
    }

    public function get_resource_list()
    {
        if ($resource = DB::table('resource')->get()) {
            return $resource;
        }

        return false;
    }

    public function get_resource($item_type, $item_id)
    {
        if (!is_numeric($item_id)) {
            return false;
        }
        $resource = DB::table('resource')->where('item_id', intval($item_id))->where('item_type', $item_type)->get();

        return $resource;
    }
}
