<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('glogin', function () {
    return view('auth/glogin');
})->name('glogin');

//認證圖片
Route::get('pic/{d?}', [HomeController::class, 'pic'])->name('pic');

Route::post('glogin', [HomeController::class, 'gauth'])->name('gauth');


/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/

Route::group(['middleware' => 'auth'], function () {
    #登出
    Route::post('logout', [HomeController::class, 'logout'])->name('logout');

    Route::get('upload', [HomeController::class, 'upload'])->name('upload');
    //結束模擬
    //Route::get('sims/impersonate_leave', [HomeController::class, 'impersonate_leave'])->name('sims.impersonate_leave');

});

Route::group(['middleware' => 'admin'], function () {   
    Route::get('assign', [HomeController::class, 'assign'])->name('assign');
    Route::post('do_assign', [HomeController::class, 'do_assign'])->name('do_assign');
    //模擬登入
    Route::get('sims/{user}/impersonate', [HomeController::class, 'impersonate'])->name('sims.impersonate');
});
