<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OpenIDController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('index', [HomeController::class, 'index']);
Route::get('show/{year}', [HomeController::class, 'show'])->name('show');

Route::get('glogin', function () {
    return view('auth/glogin');
})->name('glogin');

//openid登入
Route::get('sso', [OpenIDController::class,'sso'])->name('sso');
Route::get('auth/callback', [OpenIDController::class,'callback'])->name('callback');


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
    Route::post('upload_file', [HomeController::class, 'upload_file'])->name('upload_file');
    Route::get('delete_my_site/{year}', [HomeController::class, 'delete_my_site'])->name('delete_my_site');
    //結束模擬
    Route::get('sims/impersonate_leave', [HomeController::class, 'impersonate_leave'])->name('sims.impersonate_leave');

});

Route::group(['middleware' => 'admin'], function () {   
    Route::get('users', [HomeController::class, 'users'])->name('users');
    Route::get('ch_admin/{user}', [HomeController::class, 'ch_admin'])->name('ch_admin');
    Route::get('year', [HomeController::class, 'year'])->name('year');
    Route::get('assign/{year}', [HomeController::class, 'assign'])->name('assign');
    Route::get('delete_school/{upload}', [HomeController::class, 'delete_school'])->name('delete_school');
    Route::get('delete_site/{site}', [HomeController::class, 'delete_site'])->name('delete_site');
    Route::post('do_year', [HomeController::class, 'do_year'])->name('do_year');
    Route::post('do_assign', [HomeController::class, 'do_assign'])->name('do_assign');
    //模擬登入
    Route::get('sims/{user}/impersonate', [HomeController::class, 'impersonate'])->name('sims.impersonate');
});
