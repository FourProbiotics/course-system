<?php

namespace App\Http\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * 通过id获取评论信息
     *
     * @param integer
     * @return boolean
     */
    public function get_comment_info_by_id($id)
    {
        if (!$id) {
            return false;
        }

        return DB::table('comments')->where('id', intval($id))->first();
    }

    /**
     * 通过ids获取评论信息
     *
     * @param integer
     * @return boolean
     */
    public function get_comment_info_by_ids($ids)
    {
        if (!$ids) {
            return false;
        }

        array_walk_recursive($ids, 'intval_string');

        $result = null;

        if ($comment_list = DB::table('comments')->select('id')->whereIn('id', $ids)->get()) {
            foreach ($comment_list AS $key => $val) {
                $result[$val->id] = $val;
            }
        }

        return $result;
    }

    public function get_comment_list_by_course_id($course_id, $limit = 20)
    {
        $comment_list = DB::table('comments')->take(intval($limit))->where('course_id', $course_id)->orderBy('add_time', 'desc')->get();
        foreach ($comment_list as $key => $val) {
            $val->user_info = model('account')->get_user_info_by_uid($val->uid);
        }
        return $comment_list;
    }

    public function save_comment($course_id, $content, $uid, $reply_id = 0, $email = '', $mobile = '')
    {
        if (!$course_info = model('Course')->get_course_info_by_id($course_id)) {
            return false;
        }
        if (!$comment_id = DB::table('comments')->insertGetId(array(
            'uid' => intval($uid),
            'content' => htmlspecialchars($content),
            'reply_id' => intval($reply_id),
            'course_id' => intval($course_id),
            'hidden' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'email' => htmlspecialchars($email),
            'mobile' => htmlspecialchars($mobile),
        )))
        {
            return false;
        }

        /*DB::table('course')->where('course_id', intval($course_id))->update(array(
            'update_time' => date('Y-m-d H:i:s', time()),
        ));*/

        return $comment_id;
    }

    public function remove_comments_by_course_id($course_id)
    {
        if (!$comments = $this->get_comment_list_by_course_id($course_id)) {
            return false;
        }

        foreach ($comments as $key => $val) {
            $ids[] = $val->id;
        }

        return $this->remove_comment_by_ids($ids);
    }

    public function remove_comment_by_ids($ids)
    {
        if (!is_array($ids)) {
            return false;
        }

        foreach ($ids as $id) {
            $this->remove_comment_by_id($id);
        }

        return true;
    }

    public function remove_comment_by_id($id)
    {
        if ($answer_info = $this->get_comment_info_by_id($id)) {
            DB::table('comments')->where('id', intval($id))->delete();

            //删除附件，以后再说
        }

        return true;
    }

    public function get_comment_list($page = 0, $per_page = 50)
    {
        $posts_index = DB::table('comments')->skip(intval($page) * intval($per_page))->take(intval($per_page))->orderBy('id', 'desc')->get();
        foreach ($posts_index as $key => $val) {
            $val->course_info = model('course')->get_course_info_by_id($val->course_id);
            $val->user_info = model('account')->get_user_info_by_uid($val->uid);
        }

        return $posts_index;
    }
}
