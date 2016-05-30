<?php


Route::get('/', function () {
    return view('index');
});
####################################################
#登录，登出, 自动跳转, 密码重置
####################################################
Route::get('login', [
    'middleware' => 'web', 'as' => 'login', 'uses' => 'Account\loginController@loginGet']);
Route::post('login', [
    'middleware' => 'web', 'uses' => 'Account\loginController@loginPost']);
Route::get('logout', [
    'middleware' => 'web', 'as' => 'logout', 'uses' => 'Account\loginController@logout']);

