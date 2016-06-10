<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->increments('id')->comment = '通知id';
            $table->string('title')->comment = '消息标题';
            $table->string('content')->comment = '消息内容';
            $table->integer('sender_uid')->comment = '通知者id';
            $table->text('recipient_uid')->comment = '被通知者id';
            $table->timestamp('add_time')->comment = '添加时间';
            $table->tinyInteger('read_flag')->comment = '阅读状态';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notification');
    }
}
