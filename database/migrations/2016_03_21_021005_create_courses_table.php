<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('course_id')->comment = '课程id';
            $table->string('course_name')->comment = '课程名字';
            $table->string('teacher_name')->comment = '教师名字';
            $table->string('course_term')->comment = '授课学期';
            $table->string('course_college')->comment = '授课学院';
            $table->string('course_content')->comment = '课程简介';
            $table->timestamp('add_time')->comment = '添加时间';
            $table->timestamp('update_time')->comment = '更新时间';
            $table->text('teach_outline')->comment = '授课大纲';
            $table->text('teach_plan')->comment = '授课计划';
            $table->text('teach_ppt')->comment = '教案';
            $table->text('teach_book')->comment = '教材';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
