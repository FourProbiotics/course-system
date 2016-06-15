<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announces', function (Blueprint $table) {
            $table->increments('id')->comment = '公告id';
            $table->string('title')->comment = '公告标题';
            $table->text('content')->comment = '公告内容';
            $table->timestamp('add_time')->comment = '添加时间';
            $table->timestamp('update_time')->comment = '更新时间';
            $table->string('type')->comment = '公告类型';
            $table->tinyInteger('has_resource')->comment = '是否存在附件';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('announces');
    }
}
