<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryMeetingController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ChatMessageController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\GovernorateCityController;
use App\Http\Controllers\Api\GovernorateController;
use App\Http\Controllers\Api\MeetingController;
use App\Http\Controllers\Api\MeetingSearchController;
use App\Http\Controllers\Api\MeetingUserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('register', [AuthController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('meetings', MeetingController::class);

    Route::post('meetings/search', MeetingSearchController::class)->name('meetings.search');

    Route::apiResource('users', UserController::class)->only(['show', 'update']);

    Route::apiResource('favorites', FavoriteController::class)->only(['index', 'store', 'destroy']);

    Route::get('users/{user}/meetings', [MeetingUserController::class, 'index'])->name('users.meetings.index');

    Route::get('users/{user}/meetings/created-by', [MeetingUserController::class, 'getMeetingsCreatedByUser'])
        ->name('users.meetings.getMeetingsCreatedByUser');

    Route::get('categories/{category}/meetings', [CategoryMeetingController::class, 'index'])
        ->name('categories.meeting.index');

    Route::get('meetings/{meeting}/users/{user}/join-user', [MeetingUserController::class, 'joinUser'])
        ->name('meetings.users.joinUser');

    Route::apiResource('slides', SlideController::class)->only('index');

    Route::apiResource('chats', ChatController::class);

    Route::apiResource('chats.messages', ChatMessageController::class)->only('index', 'store');

    Route::delete('messages/{message}', [ChatMessageController::class, 'destroy']);

    Route::apiResource('notifications', NotificationController::class)->only('index', 'destroy');

    Route::apiResource('governorates', GovernorateController::class)->only('index');

    Route::apiResource('governorates.cities', GovernorateCityController::class)->only('index');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

