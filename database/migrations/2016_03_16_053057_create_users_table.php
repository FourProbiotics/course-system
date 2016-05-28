<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment = "用户id";
            $table->bigInteger('uno')->comment = "学工号";
            $table->string('password')->comment = "密码";
            $table->string('email')->comment = "邮箱";
            $table->string('mobile')->comment = "手机号";
            $table->string('avatar_file')->comment = "头像文件";
            $table->tinyInteger('sex')->comment = "性别";
            $table->timestamp('last_login')->comment = "最后登录";
            $table->timestamp('updated_at')->comment = "最后更新";
            $table->timestamp('created_at')->comment = "注册时间";
            $table->rememberToken()->comment = "登录token";
            $table->integer('group_id')->comment = "用户组";
            $table->tinyInteger('valid_email')->comment = "邮箱验证";
            $table->string('name')->comment = "姓名";
            $table->string('college')->comment = "学院";
            $table->string('class')->comment = "班级";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
