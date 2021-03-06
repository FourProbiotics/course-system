<?php


Route::get('/', [
    'middleware' => 'web', 'uses' => 'indexController@index']);

Route::get('/download/{id}', [
    'middleware' => 'web', 'uses' => 'Download\mainController@index'])->where('id', '[0-9]+');

/*Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});*/
####################################################
#登录，登出, 自动跳转, 密码重置
####################################################
Route::get('login', [
    'middleware' => 'web', 'as' => 'login', 'uses' => 'Account\loginController@loginGet']);
Route::post('login', [
    'middleware' => 'web', 'uses' => 'Account\loginController@loginPost']);
Route::get('logout', [
    'middleware' => 'web', 'as' => 'logout', 'uses' => 'Account\loginController@logout']);

####################################################
#用户资料和信息的相关操作
####################################################
Route::get('account/profile', [
    'middleware' => 'web', 'uses' => 'Account\mainController@profile']);

Route::get('account/change_password', [
    'middleware' => 'web', 'as' => 'change_password', 'uses' => 'Account\mainController@change_password']);

Route::post('account/change_password', [
    'middleware' => 'web', 'uses' => 'Account\mainController@reset_password']);

Route::get('home/courses', [
    'middleware' => 'web', 'uses' => 'Home\mainController@courses']);

Route::get('home/homework', [
    'middleware' => 'web', 'as' => 'home_homework', 'uses' => 'Home\mainController@homework']);

Route::get('home/messages', [
    'middleware' => 'web', 'uses' => 'Home\mainController@messages']);

Route::get('home/message/{id}', [
    'middleware' => 'web', 'uses' => 'Home\mainController@message'])->where('id', '[0-9]+');

####################################################
#课程的相关操作
####################################################
Route::get('courses/', [
    'middleware' => 'web', 'uses' => 'Courses\mainController@index']);

Route::get('course/{id}', [
    'middleware' => 'web', 'as' => 'course_detail', 'uses' => 'Courses\mainController@course'])->where('id', '[0-9]+');

Route::post('course/{id}', [
    'middleware' => 'web', 'uses' => 'Courses\mainController@course_post'])->where('id', '[0-9]+');

####################################################
#公告的相关操作
####################################################
Route::get('announces/', [
    'middleware' => 'web', 'uses' => 'Announces\mainController@index']);

Route::get('announce/{id}', [
    'middleware' => 'web', 'uses' => 'Announces\mainController@announce'])->where('id', '[0-9]+');

####################################################
#资源的相关操作
####################################################
//Route::get('announces/', ['middleware' => 'web', 'uses' => 'Announces\mainController@index']);

Route::get('resource/{id}', [
    'middleware' => 'web', 'uses' => 'Resources\mainController@resource'])->where('id', '[0-9]+');

####################################################
#作业的相关操作
####################################################
//Route::get('announces/', ['middleware' => 'web', 'uses' => 'Announces\mainController@index']);

Route::get('homework/{id}', [
    'middleware' => 'web', 'uses' => 'Homework\mainController@homework'])->where('id', '[0-9]+');

Route::get('homework/{id}/submit', [
    'middleware' => 'web', 'as' => 'homework_submit', 'uses' => 'Homework\mainController@submit'])->where('id', '[0-9]+');

Route::post('homework/{id}/submit', [
    'middleware' => 'web', 'uses' => 'Homework\mainController@submit_post'])->where('id', '[0-9]+');

####################################################
#admin的相关操作
####################################################
Route::group(['as' => 'admin::'], function () {
    Route::get('admin/', [
         'middleware' => 'web', 'uses' => 'Admin\mainController@index']);
    Route::get('admin/setting', [
        'as' => 'setting', 'middleware' => 'web', 'uses' => 'Admin\mainController@setting']);
    Route::post('admin/setting', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@setting_post']);

    Route::get('admin/messages', [
        'as' => 'messages', 'middleware' => 'web', 'uses' => 'Admin\mainController@messages']);
    Route::get('admin/message/new', [
        'middleware' => 'web', 'as' => 'message_new', 'uses' => 'Admin\mainController@message_new']);
    Route::post('admin/message/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@message_new_post']);
    Route::get('admin/message/{id}/delete', [
        'middleware' => 'web', 'as' => 'message_new', 'uses' => 'Admin\mainController@message_delete'])->where('course_id', '[0-9]+');

    Route::get('admin/courses', [
        'as' => 'courses', 'middleware' => 'web', 'uses' => 'Admin\mainController@courses']);
    Route::get('admin/course/new', [
        'as' => 'course_new', 'middleware' => 'web', 'uses' => 'Admin\mainController@course_new']);
    Route::post('admin/course/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@course_new_post']);
    Route::get('admin/course/{course_id}/delete', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@course_delete'])->where('course_id', '[0-9]+');
    Route::get('admin/course/{course_id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@course_edit'])->where('course_id', '[0-9]+');
    Route::post('admin/course/{course_id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@course_edit_post'])->where('course_id', '[0-9]+');
    Route::get('admin/course/{course_id}/students', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@course_students'])->where('course_id', '[0-9]+');
    Route::get('admin/course/{course_id}/groups', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@course_groups'])->where('course_id', '[0-9]+');

    Route::get('admin/homework', [
        'as' => 'homework', 'middleware' => 'web', 'uses' => 'Admin\mainController@homework']);
    Route::get('admin/homework/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@homework_new']);
    Route::post('admin/homework/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@homework_new_post']);
    Route::get('admin/homework/{homework_id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@homework_edit'])->where('homework_id', '[0-9]+');
    Route::post('admin/homework/{homework_id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@homework_edit_post'])->where('homework_id', '[0-9]+');
    Route::get('admin/homework/{homework_id}/delete', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@homework_delete'])->where('homework_id', '[0-9]+');
    Route::get('admin/homework/{homework_id}/answer', [
        'as' => 'homework_answer', 'middleware' => 'web', 'uses' => 'Admin\mainController@homework_answer'])->where('homework_id', '[0-9]+');
    Route::get('admin/homework/{homework_id}/answer/{answer_id}/marking', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@homework_marking'])
        ->where('homework_id', '[0-9]+')->where('answer_id', '[0-9]+');
    Route::post('admin/homework/{homework_id}/answer/{answer_id}/marking', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@homework_marking_post'])
        ->where('homework_id', '[0-9]+')->where('answer_id', '[0-9]+');

    Route::get('admin/resources', [
        'as' => 'resources', 'middleware' => 'web', 'uses' => 'Admin\mainController@resources']);
    Route::get('admin/resource/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@resource_new']);
    Route::get('admin/resource/{id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@resource_edit'])->where('id', '[0-9]+');
    Route::get('admin/resource/{id}/delete', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@resource_delete'])->where('id', '[0-9]+');

    Route::get('admin/announces/', [
        'as' => 'announces', 'middleware' => 'web', 'uses' => 'Admin\mainController@announces']);
    Route::get('admin/announce/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@announce_new']);
    Route::post('admin/announce/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@announce_new_post']);
    Route::get('admin/announce/{id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@announce_edit'])->where('id', '[0-9]+');
    Route::post('admin/announce/{id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@announce_edit_post'])->where('id', '[0-9]+');
    Route::get('admin/announce/{id}/delete', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@announce_delete'])->where('id', '[0-9]+');

    Route::get('admin/students', [
        'as' => 'students', 'middleware' => 'web', 'uses' => 'Admin\mainController@students']);
    Route::get('admin/student/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@student_new']);
    Route::post('admin/student/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@student_new_post']);
    Route::get('admin/student/import', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@student_import']);
    Route::post('admin/student/import', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@student_import_post']);
    Route::get('admin/student/{uid}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@student_edit'])->where('uid', '[0-9]+');
    Route::post('admin/student/{uid}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@student_edit_post'])->where('uid', '[0-9]+');

    Route::get('admin/comments', [
        'as' => 'comments', 'middleware' => 'web', 'uses' => 'Admin\mainController@comments']);
    Route::get('admin/comment/{id}/reply', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@comment_reply'])->where('id', '[0-9]+');

    Route::get('admin/groups', [
        'as' => 'groups', 'middleware' => 'web', 'uses' => 'Admin\mainController@groups']);
    Route::get('admin/groups/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@groups_new']);
    Route::post('admin/groups/new', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@groups_new_post']);
    Route::get('admin/groups/{group_id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@groups_edit'])->where('group_id', '[0-9]+');
    Route::post('admin/groups/{group_id}/edit', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@groups_edit_post'])->where('group_id', '[0-9]+');
    Route::get('admin/groups/{group_id}/delete', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@groups_delete'])->where('group_id', '[0-9]+');
    Route::get('admin/groups/{group_id}/marking', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@groups_marking'])->where('group_id', '[0-9]+');
    Route::post('admin/groups/{group_id}/marking', [
        'middleware' => 'web', 'uses' => 'Admin\mainController@groups_marking_post'])->where('group_id', '[0-9]+');
});