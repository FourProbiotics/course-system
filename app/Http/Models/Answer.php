<?php

namespace App\Http\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function get_answer_by_id($answer_id)
    {
        return DB::table('homework_answers')->where('answer_id', intval($answer_id))->first();
    }

    public function get_answers_by_ids($answer_ids)
    {
        if (!is_array($answer_ids)) {
            return false;
        }

        if ($answers = DB::table('homework_answers')->whereIn('answer_id', intval($answer_ids))->get()) {
            foreach ($answers AS $key => $val) {
                $result[$val->answer_id] = $val;
            }
        }

        return $result;
    }

    /**
     *
     * 保存作业答案
     */
    public function save_answer($homework_id, $answer_content, $uid)
    {
        if (!$homework_info = model('homework')->get_homework_info_by_id($homework_id)) {
            return false;
        }

        if (!$answer_id = DB::table('homework_answers')->insertGetId(array(
            'homework_id' => intval($homework_id),
            'answer_content' => htmlspecialchars($answer_content),
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'uid' => intval($uid),
        ))
        ) {
            return false;
        }

        return $answer_id;
    }

    /**
     *
     * 更新作业答案
     */
    public function update_answer($answer_id, $answer_content)
    {
        $answer_id = intval($answer_id);

        if (!$answer_id) {
            return false;
        }

        $data = array(
            'answer_content' => htmlspecialchars($answer_content),
            'update_time' => date('Y-m-d H:i:s', time()),
        );

        return DB::table('homework_answers')->where('answer_id', intval($answer_id))->update($data);
    }

    /**
     * 删除作业关联的所有作业答案及相关的内容
     */
    public function remove_answers_by_homework_id($homework_id)
    {
        if (!$answers = $this->get_answer_list_by_homework_id($homework_id)) {
            return false;
        }

        foreach ($answers as $key => $val) {
            $answer_ids[] = $val->answer_id;
        }

        return $this->remove_answer_by_ids($answer_ids);
    }

    public function get_answer_list_by_homework_ids($homework_ids)
    {
        if (!is_array($homework_ids)) {
            return false;
        }

        $answer_list = array();

        foreach ($homework_ids as $key => $id) {
            $answer_list[] = $this->get_answer_list_by_homework_id($id);
        }

        return $answer_list;
    }

    public function get_answer_list_by_homework_id($homework_id, $read_flag = null)
    {
        $db = DB::table('homework_answers')->where('homework_id', intval($homework_id))->orderBy('homework_id', 'desc');
        if($read_flag)
        {
            $db->where('read_flag', $read_flag);
        }
        if ($answer_list = $db->get()) {
            foreach ($answer_list as $key => $val) {
                $uids[] = $val->uid;
            }
        }

        if ($uids) {
            if ($users_info = model('account')->get_user_info_by_uids($uids)) {
                foreach ($answer_list as $key => $val) {
                    $answer_list[$key]->user_info = $users_info[$val->uid];
                }
            }
        }

        return $answer_list;
    }

    /**
     * 根据回复集合批量删除答案
     */
    public function remove_answer_by_ids($answer_ids)
    {
        if (!is_array($answer_ids)) {
            return false;
        }

        foreach ($answer_ids as $answer_id) {
            $this->remove_answer_by_id($answer_id);
        }

        return true;
    }

    public function remove_answer_by_id($answer_id)
    {
        if ($answer_info = $this->get_answer_by_id($answer_id)) {
            DB::table('homework_answers')->where('answer_id', intval($answer_id))->delete();
            //删除附件，以后再说
        }

        return true;
    }

    public function get_answer_list_by_course_id($course_id, $uid = null)
    {
        $homework_ids = model('homework')->get_homework_ids_by_course_id($course_id);
        $db = DB::table('homework_answers')->whereIn('homework_id', $homework_ids)->orderBy('add_time', 'desc');

        if ($uid) {
            $db->where('uid', $uid);
        }

        $posts_index = $db->get();

        return $posts_index;
    }

    public function get_answer_list_by_uid($uid, $homework_id = null)
    {
        $db = DB::table('homework_answers')->where('uid', $uid)->orderBy('add_time', 'desc');

        if ($homework_id) {
            $db->where('homework_id', $homework_id);
        }

        $posts_index = $db->get();

        return $posts_index;
    }

    public function get_answer_by_uid($uid, $homework_id = null)
    {
        $db = DB::table('homework_answers')->where('uid', $uid);

        if ($homework_id) {
            $db->where('homework_id', $homework_id);
        }

        $posts_index = $db->first();

        return $posts_index;
    }
}
