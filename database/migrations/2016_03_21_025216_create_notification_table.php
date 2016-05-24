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
            $table->increments('notification_id')->comment = '通知id';
            $table->integer('sender_uid')->comment = '留言者id';
            $table->integer('recipient_uid')->comment = '留言者id';
            $table->integer('action_type')->comment = '操作类型';
            $table->string('source_id')->comment = '关联id';
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
