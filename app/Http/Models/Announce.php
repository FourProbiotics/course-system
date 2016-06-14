<?php

namespace App\Http\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    public function get_announce_info_by_id($id)
    {
        if (!$id) {
            return false;
        }

        return DB::table('announces')->where('id', intval($id))->first();
    }

    public function get_announce_info_by_ids($ids)
    {
        if (!$ids) {
            return false;
        }

        array_walk_recursive($ids, 'intval_string');

        $result = null;

        if ($announces_list = $user_info = DB::table('announces')->whereIn('id', $ids)->get()) {
            foreach ($announces_list AS $key => $val) {
                $result[$val->id] = $val;
            }
        }

        return $result;
    }

    public function save_announce($title, $content, $has_resource = 0, $type = '')
    {
        $to_save_announce = array(
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'has_resource' => intval($has_resource),
            'type' => $type,
        );

        $id = DB::table('announces')->insertGetId($to_save_announce);

        if ($id) {
            //提醒?
        }

        return $id;
    }

    public function update_announce($id, $title, $content, $has_resource = 0, $type = '')
    {
        if (!$announce_info = $this->get_announce_info_by_id($id)) {
            return false;
        }

        $data['title'] = htmlspecialchars($title);

        if ($content) {
            $data['content'] = htmlspecialchars($content);
        }
        if ($has_resource) {
            $data['has_resource'] = intval($has_resource);
        }
        if ($type) {
            $data['type'] = htmlspecialchars($type);
        }

        DB::table('announces')->where('id', intval($id))->update($data);

        return true;
    }

    public function remove_announce($id)
    {
        if (!$announce_info = $this->get_announce_info_by_id($id)) {
            return false;
        }

        DB::table('announces')->where('id', intval($id))->delete();

        // 删除附件
        // 以后再说
    }

    public function get_announces_list($page = 0, $per_page = 10)
    {
        $posts_index = DB::table('announces')->
        skip(intval($page) * intval($per_page))->
        take(intval($per_page))->
        orderBy('add_time', 'desc')->get();

        return $posts_index;
    }
}
