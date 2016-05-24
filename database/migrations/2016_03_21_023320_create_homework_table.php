<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->increments('homework_id')->comment = '作业id';
            $table->string('homework_title')->comment = '作业标题';
            $table->text('homework_content')->comment = '作业内容';
            $table->text('homework_code')->comment = '示例代码';
            $table->integer('course_id')->comment = '关联课程';
            $table->timestamp('deadline')->comment = '截止日期';
            $table->timestamp('add_time')->comment = '添加时间';
            $table->timestamp('update_time')->comment = '更新时间';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('homework');
    }
}
