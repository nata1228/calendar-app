<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FollowUserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\InvitationController;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 管理者
Route::get('/admin', function () {
    return Inertia::render('Admin');
});

// エンドユーザー
Route::get('/user', function () {
    return Inertia::render('EndUser');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'],function() {
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/button', [CalendarController::class, 'get_schedules'])->name('calendar.schedules');
    Route::get('/show',[CalendarController::class, 'show'])->name('calendar.show');
    Route::get('/follow', [FollowUserController::class, 'get_user'])->name('follow.user');
    Route::post('/schedule', [CalendarController::class, 'create'])->name('schedule.create');
    Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');
    Route::get('/invitation', [InvitationController::class, 'invitation'])->name('invitation.user');

});
