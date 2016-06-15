<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        User::create([
            'uno' => 1,
            'last_login' => date('Y-m-d H:i:s', time()),
            'group_id' => 1,
            'name' => 'admin',
            'college' => 'admin',
            'class' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'uno' => 2,
            'last_login' => date('Y-m-d H:i:s', time()),
            'group_id' => 2,
            'name' => 'test',
            'college' => 'test',
            'class' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ]);

        DB::table('system_setting')->insert([
            'varname' => 'site_name',
            'value' => serialize('PHP课程网站'),
        ]);

        DB::table('courses')->insert([
            'course_name' => '测试课程1',
            'course_content' => 'PHP是超级文本预处理语言Hypertext Preprocessor的缩写。PHP是一种HTML内嵌式的语言，是一种在服务器端执行的嵌入HTML文档的脚本语言，语言的风格有类似于C语言，被广泛的运用。PHP文件一般由专业程序开发人员编写。',
            'teacher_name' => '徐利锋',
            'course_term' => '2015/2016(1)',
            'course_college' => '计算机学院',
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'teach_outline' => htmlspecialchars('测试：这是授课大纲(text)'),
            'teach_plan' => ('<img src="http://202.120.143.134/Download/20150918154248001.jpg">'),
            'teach_ppt' => serialize([1, 2]),//这是教案(resource id)
            'teach_book' => serialize([
                ['name' => '测试：这是教材(serialize array)'],
            ]),
        ]);

        DB::table('courses')->insert([
            'course_name' => '测试课程2',
            'course_content' => '测试内容2',
            'teacher_name' => '徐利锋',
            'course_term' => '2015/2016(1)',
            'course_college' => '计算机学院',
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'teach_outline' => htmlspecialchars('测试：这是授课大纲(text)'),
            'teach_plan' => htmlspecialchars('测试：这是授课计划(text)'),
            'teach_ppt' => serialize([1, 2]),
            'teach_book' => serialize(array(
                ['name' => '新华字典', 'url' => 'http://baidu.com'],
                ['name' => '上下五千年', 'url' => 'http://baidu.com'],
            )),
        ]);

        DB::table('resource')->insert([
            'file_name' => '测试资源1',
            'resource_content' => '测试资源内容1',
            'add_time' => date('Y-m-d H:i:s', time()),
            'file_location' => 'resource/test.rar',
            'item_type' => 'announce',
            'item_id' => 1,
        ]);

        DB::table('resource')->insert([
            'file_name' => '测试资源2',
            'resource_content' => '测试资源内容2',
            'add_time' => date('Y-m-d H:i:s', time()),
            'file_location' => 'resource/test.rar',
            'item_type' => 'course',
            'item_id' => 1,
        ]);

        DB::table('homework')->insert([
            'homework_title' => '测试作业1',
            'homework_content' => '测试作业内容1',
            'homework_code' => '测试代码1',
            'course_id' => 1,
            'deadline' => date('Y-m-d H:i:s', time()),
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('homework')->insert([
            'homework_title' => '测试作业2',
            'homework_content' => '测试作业内容2',
            'homework_code' => '测试代码2',
            'course_id' => 1,
            'deadline' => date('Y-m-d H:i:s', strtotime('+1 week')),
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('comments')->insert([
            'uid' => 1,
            'content' => '测试留言内容1',
            'reply_id' => 0,
            'course_id' => 1,
            'hidden' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'email' => '',
            'mobile' => '',
        ]);

        DB::table('comments')->insert([
            'uid' => 1,
            'content' => '测试留言内容2',
            'reply_id' => 0,
            'course_id' => 1,
            'hidden' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
            'email' => '',
            'mobile' => '',
        ]);

        DB::table('messages')->insert([
            'title' => '测试消息标题1',
            'content' => '测试消息内容1',
            'sender_uid' => 1,
            'recipient_uid' => serialize([1]),
            'action_type' => 1,
            'add_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('messages')->insert([
            'title' => '测试消息标题2',
            'content' => '测试消息内容2',
            'sender_uid' => 1,
            'recipient_uid' => serialize([1]),
            'action_type' => 2,
            'add_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('messages')->insert([
            'title' => '测试消息标题2',
            'content' => '测试消息内容2',
            'sender_uid' => 1,
            'recipient_uid' => serialize([1]),
            'action_type' => 2,
            'add_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('groups')->insert([
            'score' => 0,
            'course_id' => 1,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('groups')->insert([
            'score' => 0,
            'course_id' => 1,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('homework_answers')->insert([
            'answer_content' => '测试作业1',
            'uid' => 1,
            'homework_id' => 1,
            'score' => 0,
            'read_flag' => 1,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('homework_answers')->insert([
            'answer_content' => '测试作业2',
            'uid' => 1,
            'homework_id' => 2,
            'score' => 0,
            'read_flag' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('announces')->insert([
            'title' => '测试公告1',
            'content' => '测试公告内容1',
            'type' => '公告',
            'has_resource' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('announces')->insert([
            'title' => '测试公告2',
            'content' => '测试公告内容2',
            'type' => '通知',
            'has_resource' => 1,
            'add_time' => date('Y-m-d H:i:s', time()),
            'update_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('notification')->insert([
            'title' => '测试消息1',
            'content' => '测试消息内容1',
            'sender_uid' => 1,
            'recipient_uid' => 2,
            'read_flag' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
        ]);

        DB::table('notification')->insert([
            'title' => '测试消息2',
            'content' => '测试消息内容2',
            'sender_uid' => 1,
            'recipient_uid' => 1,
            'read_flag' => 0,
            'add_time' => date('Y-m-d H:i:s', time()),
        ]);


    }
}
