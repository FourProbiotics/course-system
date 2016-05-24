<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentHomeworkAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_answers', function (Blueprint $table) {
            $table->increments('answer_id')->comment = '回答id';
            $table->text('answer_content')->comment = '回答内容';
            $table->integer('answer_type')->comment = '回答类型';
            $table->integer('uid')->comment = '回答者id';
            $table->timestamp('add_time')->comment = '添加时间';
            $table->timestamp('update_time')->comment = '更新时间';
            $table->integer('score')->comment = '分数';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('homework_answers');
    }
}
