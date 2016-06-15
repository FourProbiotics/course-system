<?php

namespace App\Http\Models;

use DB;
use Auth;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * 通过course_id获取课程信息
     *
     * @param string
     * @return boolean
     */
    public function get_course_info_by_id($course_id)
    {
        if (!$course_id) {
            return false;
        }

        $course = DB::table('courses')->where('course_id', intval($course_id))->first();

        $course->resource = model('resource')->get_resource('course', $course_id);

        return DB::table('courses')->where('course_id', intval($course_id))->first();
    }

    /**
     * 通过course_ids获取课程信息
     *
     * @param string
     * @return boolean
     */
    public function get_course_info_by_ids($course_ids)
    {
        if (!$course_ids) {
            return false;
        }

        array_walk_recursive($course_ids, 'intval');

        $result = null;

        if ($courses_list = $user_info = DB::table('courses')->whereIn('course_id', $course_ids)->get()) {
            foreach ($courses_list AS $key => $val) {
                $result[$val->course_id] = $val;
            }
        }

        return $result;
    }

    /**
     *
     * 增加课程内容
     * @param string $course_name //课程内容
     * @param string $course_content //课程说明
     *
     * @return boolean true|false
     */
    public function save_course($course_name, $course_content, $course_term, $teach_outline = '', $teach_plan = '', $course_college = '计算机学院', $teacher_name = '徐利锋', $teach_ppt = [], $teach_book = [])
    {
        $to_save_course = array(
            'course_name' => htmlspecialchars($course_name),
            'course_content' => htmlspecialchars($course_content),
            'teacher_name' => $teacher_name,
            'course_term' => $course_term,
            'course_college' => $course_college,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'teach_outline' => $teach_outline?$teach_outline:'暂无',
            'teach_plan' => $teach_plan?$teach_plan:'暂无',
            'teach_ppt' => serialize($teach_ppt),//这是教案(resource id)
            'teach_book' => serialize($teach_book),
        );

        $course_id = DB::table('courses')->insertGetId($to_save_course);

        if ($course_id) {
            //提醒?
        }

        return $course_id;
    }

    /**
     *
     * 更新课程内容
     * @param string $course_name //课程内容
     * @param string $course_content //课程说明
     *
     * @return boolean true|false
     */
    public function update_course($course_id, $course_name, $course_content, $course_term = null, $teach_outline = null, $teach_plan = null, $course_college = null, $teacher_name = null, $teach_ppt = null, $teach_book = null)
    {
        if (!$course_info = $this->get_course_info_by_id($course_id)) {
            return false;
        }

        $data['course_name'] = htmlspecialchars($course_name);

        if ($course_content) {
            $data['course_content'] = htmlspecialchars($course_content);
        }
        if ($course_term) {
            $data['course_term'] = htmlspecialchars($course_term);
        }
        if ($teach_outline) {
            $data['teach_outline'] = $teach_outline?$teach_outline:'暂无';
        }
        if ($teach_plan) {
            $data['teach_plan'] = $teach_plan?$teach_plan:'暂无';
        }
        if ($course_college) {
            $data['course_college'] = htmlspecialchars($course_college);
        }
        if ($teacher_name) {
            $data['teacher_name'] = htmlspecialchars($teacher_name);
        }
        if ($teach_ppt) {
            $data['teach_ppt'] = serialize($teach_ppt);
        }
        if ($teach_book) {
            $data['teach_book'] = serialize($teach_book);
        }

        DB::table('courses')->where('course_id', intval($course_id))->update($data);

        return true;
    }

    /**
     *
     * 删除课程内容
     * @param string $course_id //课程id
     *
     * @return boolean true|false
     */
    public function remove_course($course_id)
    {
        if (!$course_info = $this->get_course_info_by_id($course_id)) {
            return false;
        }

        DB::table('courses')->where('course_id', intval($course_id))->delete();

        // 删除评论
        DB::table('comments')->where('course_id', intval($course_id))->delete();

        // 删除附件
        // 以后再说
    }

    public function get_courses_list($page = 1, $per_page = 10)
    {
        $posts_index = DB::table('courses')->skip(intval($page) * intval($per_page))->take(intval($per_page))->orderBy('course_id', 'desc')->get();

        return $posts_index;
    }
}