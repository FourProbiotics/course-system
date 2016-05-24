<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {
            $table->increments('id')->comment = '资源id';
            $table->string('file_name')->comment = '文件名称';
            $table->string('resource_content')->comment = '资源描述';
            $table->string('file_location')->comment = '文件位置';
            $table->string('item_type')->comment = '关联类型';
            $table->string('item_id')->comment = '关联id';
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
        Schema::drop('resource');
    }
}
