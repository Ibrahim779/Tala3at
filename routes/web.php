<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ChatVueController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GovernorateCityController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\SetLocal;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest:admin')->group(function () {

    Route::view('login', 'admin.auth.login')->name('loginForm');

    Route::post('login', [AuthController::class, 'login'])->name('login');

});

Route::middleware('auth:admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('meetings', MeetingController::class);

    Route::resource('categories', CategoryController::class);

    Route::get('governorates/{governorate}/cities', [GovernorateCityController::class, 'index']);

    Route::resource('users', UserController::class);

    Route::resource('slides', SlideController::class);

    Route::resource('admins', AdminController::class);

    Route::get('profile', [AdminController::class, 'profile'])->name('profile');

    Route::get('chats', [ChatController::class, 'index'])->name('chats.index');

    Route::get('chats/vue', [ChatVueController::class, 'index'])->name('chatsVue.index');

    Route::get('chats/fetch', [ChatVueController::class, 'fetch'])->name('chatsVue.fetch');

    Route::get('chats/{chatId}/messages', [ChatVueController::class, 'getMessages'])->name('chatsVue.getMessages');

    Route::post('chats/sendMessage', [ChatVueController::class, 'sendMessage'])->name('chatsVue.sendMessage');

    Route::resource('roles', RoleController::class);

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

Route::get('lang/{lang}', function ($lang){
    session([
        SetLocal::LANG_KEY => $lang
    ]);
    return back();
})->name('lang');
