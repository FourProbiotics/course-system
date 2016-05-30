<?php


Route::get('/', [
    'middleware' => 'web', 'uses' => 'indexController@index']);
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
    'middleware' => 'web', 'uses' => 'Account\mainController@change_password']);

Route::get('home/courses', [
    'middleware' => 'web', 'uses' => 'Home\mainController@courses']);

Route::get('home/homework', [
    'middleware' => 'web', 'uses' => 'Home\mainController@homework']);

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
    'middleware' => 'web', 'uses' => 'Courses\mainController@course'])->where('id', '[0-9]+');

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