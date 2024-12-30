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

Route::group('', function () {
    Route::get('', 'Index/index');
    Route::get('/login', 'Index/login');
    Route::get('/register', 'Index/register');
    Route::get('/detail', 'Index/detail');
});

// http://dev.aicovers.com/aicover/aicover
Route::group('aicover', function () {
    Route::get('/aicover', 'Aicover/aicover');
});
