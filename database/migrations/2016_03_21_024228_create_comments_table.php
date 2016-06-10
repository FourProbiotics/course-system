<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment = '留言者id';
            $table->string('content')->comment = '留言信息';
            $table->integer('reply_id')->comment = '回复id';
            $table->integer('course_id')->comment = '关联课程';
            $table->tinyInteger('hidden')->comment = '是否隐藏';
            $table->timestamp('add_time')->comment = '添加时间';
            $table->timestamp('update_time')->comment = '更新时间';
            $table->string('email')->comment = '游客邮箱';
            $table->string('mobile')->comment = '游客手机';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
