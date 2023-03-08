<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/[:name]', 'index/hello');
Route::get('index', 'index/index');
Route::get('user/register', 'user/user/register');
Route::get('user/login', 'user/user/login');
Route::get('user/[:username]', 'user/user/index');
Route::get('user', 'user/user/index');
Route::get('api/register', 'api/api/register');

return [

];
