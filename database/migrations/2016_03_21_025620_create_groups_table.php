<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('group_id')->comment = '分组id';
            $table->integer('score')->comment = '分数';
            $table->integer('course_id')->comment = '课程id';
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
        Schema::drop('groups');
    }
}
