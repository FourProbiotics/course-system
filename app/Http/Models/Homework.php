<?php

namespace App\Http\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    /**
     * 通过homework_id获取课程信息
     *
     * @param string
     * @return boolean
     */
    public function get_homework_info_by_id($homework_id)
    {
        if (!$homework_id) {
            return false;
        }

        return DB::table('homework')->where('homework_id', intval($homework_id))->first();
    }

    /**
     * 通过homework_ids获取作业信息
     *
     * @param string
     * @return boolean
     */
    public function get_homework_info_by_ids($homework_ids)
    {
        if (!$homework_ids) {
            return false;
        }

        array_walk_recursive($homework_ids, 'intval');

        $result = null;

        if ($homework_list = DB::table('homework')->select('homework_id')->whereIn('homework_id', $homework_ids)->get()) {
            foreach ($homework_list AS $key => $val) {
                $result[$val->homework_id] = $val;
            }
        }

        return $result;
    }

    /**
     *
     * 增加作业内容
     * @param string $homework_title //课程内容
     * @param string $homework_content //课程说明
     *
     * @return boolean true|false
     */
    public function save_homework($homework_title, $homework_content, $course_id, $deadline, $homework_code = '')
    {
        $to_save_homework = array(
            'homework_title' => htmlspecialchars($homework_title),
            'homework_content' => htmlspecialchars($homework_content),
            'homework_code' => $homework_code,
            'course_id' => intval($course_id),
            'deadline' => date('Y-m-d H:i:s', $deadline),
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        );

        $homework_id = DB::table('homework')->insertGetId($to_save_homework);

        if ($homework_id) {
            //提醒?
        }

        return $homework_id;
    }

    public function update_homework($homework_id, $homework_title, $homework_content, $course_id, $deadline, $homework_code = '')
    {
        if (!$homework_info = $this->get_homework_info_by_id($homework_id)) {
            return false;
        }

        $data['homework_title'] = htmlspecialchars($homework_title);

        if ($homework_content) {
            $data['homework_content'] = htmlspecialchars($homework_content);
        }
        if ($course_id) {
            $data['course_id'] = intval($course_id);
        }
        if ($deadline) {
            $data['deadline'] = date('Y-m-d H:i:s', $deadline);
        }
        if ($homework_code) {
            $data['teach_plan'] = htmlspecialchars($homework_code);
        }

        DB::table('homework')->where('homework_id', intval($homework_id))->update($data);

        return true;
    }

    /**
     *
     * 删除作业内容
     * @param string $course_id //课程id
     *
     * @return boolean true|false
     */
    public function remove_course($homework_id)
    {
        if (!$homework_info = $this->get_homework_info_by_id($homework_id)) {
            return false;
        }

        DB::table('homework')->where('homework_id', intval($homework_id))->delete();

        // 删除答案
        DB::table('homework_answers')->where('homework_id', intval($homework_id))->delete();

        // 删除附件
        // 以后再说
    }

    public function get_homework_list($page = 1, $per_page = 10)
    {
        $posts_index = DB::table('homework')->skip(intval($page) * intval($per_page))->take(intval($per_page))->orderBy('add_time', 'desc')->get();

        return $posts_index;
    }

    public function get_homework_ids_by_course_id($course_id)
    {
        $posts_index = DB::table('homework')->where('course_id', $course_id)->orderBy('add_time', 'desc')->get();

        $ids = array();

        foreach ($posts_index as $key => $val) {
            $ids[] = $val->homework_id;
        }

        return $ids;
    }

    public function get_homework_list_by_course_id($course_id)
    {
        $posts_index = DB::table('homework')->where('course_id', $course_id)->orderBy('add_time', 'desc')->get();

        return $posts_index;
    }

    public function get_homework_list_by_uid($uid)
    {
        $group_info = model('group')->get_group_info_by_uid($uid);
        $posts_index = DB::table('homework')->where('course_id', $group_info->course_id)->orderBy('add_time', 'desc')->get();
        foreach ($posts_index as $key => $val) {
            $val->answer = model('answer')->get_answer_by_uid($uid, $val->homework_id);
            $val->course_info = model('course')->get_course_info_by_id($val->course_id);
        }
        return $posts_index;
    }
}
