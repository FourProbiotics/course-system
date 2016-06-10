<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id')->comment = '消息id';
            $table->string('title')->comment = '消息标题';
            $table->string('content')->comment = '消息内容';
            $table->integer('sender_uid')->comment = '发送者id';
            $table->text('recipient_uid')->comment = '序列化接受者id';
            $table->integer('action_type')->comment = '操作类型:1用户,2群组';
            $table->timestamp('add_time')->comment = '添加时间';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
