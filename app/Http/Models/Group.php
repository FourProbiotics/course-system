<?php

namespace App\Http\Models;

use DB;
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

        $data = DB::table('groups')->where('group_id', intval($group_id))->first();
        $data->member = DB::table('users')->where('group_id', intval($group_id))->get();
        $data->course_info = model('course')->get_course_info_by_id($data->course_id);

        return $data;
    }

    /**
     * 通过uid获取分组信息
     *
     * @param integer
     * @return boolean
     */
    public function get_group_info_by_uid($uid)
    {
        if (!$uid) {
            return false;
        }
        $user_info = DB::table('users')->where('id', intval($uid))->first();

        $data = DB::table('groups')->where('group_id', intval($user_info->group_id))->first();

        return $data;
    }

    /**
     * 通过group_ids获取成员uid
     *
     * @param array
     * @return boolean
     */
    public function get_member_uids_by_group_ids($group_ids)
    {
        if (!is_array($group_ids)) {
            return false;
        }
        $user_list = DB::table('users')->select('id')->whereIn('group_id', $group_ids)->get();

        $uids= array();
        foreach ($user_list as $key => $val)
        {
            $uids[] = $val->id;
        }

        return $uids;
    }

    /**
     * 获取分组列表
     *
     * @return boolean
     */
    public function get_group_list()
    {
        $groups = DB::table('groups')->get();
        foreach ($groups as $key => $val) {
            $val->member = DB::table('users')->where('group_id', intval($val->group_id))->get();
            $val->course_info = model('course')->get_course_info_by_id($val->course_id);
        }

        return $groups;
    }

    /**
     * 获取分组列表
     *
     * @return boolean
     */
    public function get_group_list_by_course_id($course_id)
    {
        $groups = DB::table('groups')->where('course_id', $course_id)->get();

        foreach ($groups as $key => $val) {
            $val->member = DB::table('users')->where('group_id', intval($val->group_id))->get();
            $val->member = $val->member ? $val->member : array();
            $val->course_info = model('course')->get_course_info_by_id($val->course_id);
            $val->member_count = count($val->member);
        }

        return $groups;
    }

    public function init_group($member_uids, $course_id)
    {
        $group_id = DB::table('groups')->insertGetId(array(
            'course_id' => $course_id,
            'score' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ));

        DB::table('users')->whereIn('id', $member_uids)->update([
            'group_id' => $group_id
        ]);

        return $group_id;
    }

    public function edit_group($group_id, $member_uids, $course_id)
    {
        DB::table('groups')->where('group_id', intval($group_id))->update([
            'course_id' => $course_id,
        ]);

        $old_member = DB::table('users')->where('group_id', intval($group_id))->get();
        $old_member_uids = array();
        foreach ($old_member as $key => $val) {
            $old_member_uids[] = $val->id;
        }

        if ($old_member_uids) {
            DB::table('users')->whereIn('id', $old_member_uids)->update([
                'group_id' => 0,
            ]);
        }

        DB::table('users')->whereIn('id', $member_uids)->update([
            'group_id' => $group_id
        ]);

        return $group_id;
    }

    public function marking_group($group_id, $marking)
    {
        DB::table('groups')->where('group_id', intval($group_id))->update([
            'score' => $marking,
        ]);

        return $group_id;
    }

    public function delete_group($group_id)
    {
        $old_member = DB::table('users')->where('group_id', intval($group_id))->get();

        DB::table('users')->whereIn('uid', $old_member)->update([
            'group_id' => 0
        ]);

        DB::table('groups')->where('group_id', intval($group_id))->delete();

        return $group_id;
    }
}
