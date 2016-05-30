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
            $table->string('announce_name')->comment = '公告名字';
            $table->string('announce_content')->comment = '公告简介';
            $table->timestamp('add_time')->comment = '添加时间';
            $table->timestamp('update_time')->comment = '更新时间';
            $table->string('announce_type')->comment = '公告类型';
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
