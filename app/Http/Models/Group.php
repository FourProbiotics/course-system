<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * 通过id获取分组信息
     *
     * @param integer
     * @return boolean
     */
    public function get_group_info_by_id($group_id)
    {
        if (!$group_id) {
            return false;
        }

        $data['group'] = DB::table('groups')->where('group_id', intval($group_id))->first();
        $data['member'] = DB::table('users')->where('group_id', intval($group_id))->get();

        return $data;
    }

    /**
     * 获取分组列表
     *
     * @return boolean
     */
    public function get_group_list()
    {
        $groups = DB::table('groups')->first();
        foreach ($groups as $key => $val) {
            $groups['member'] = DB::table('users')->where('group_id', intval($val->group_id))->get();
        }

        return $groups;
    }

    public function init_group($member_uids)
    {
        $group_id = DB::table('groups')->insertGetId(array(
            'score' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ));

        DB::table('users')->whereIn('uid', $member_uids)->update([
            'group_id' => $group_id
        ]);

        return $group_id;
    }

    public function edit_group($group_id, $member_uids)
    {
        $old_member = DB::table('users')->where('group_id', intval($group_id))->get();

        DB::table('users')->whereIn('uid', $old_member)->update([
            'group_id' => 0
        ]);

        DB::table('users')->whereIn('uid', $member_uids)->update([
            'group_id' => $group_id
        ]);

        return $group_id;
    }

    public function delete_group($group_id, $member_uids)
    {
        $old_member = DB::table('users')->where('group_id', intval($group_id))->get();

        DB::table('users')->whereIn('uid', $old_member)->update([
            'group_id' => 0
        ]);

        return $group_id;
    }
}
