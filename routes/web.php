<?php

use App\http\controllers\IndividualEventController;
use App\http\controllers\GroupEventController;
use App\http\controllers\LecturerController;
use App\http\controllers\StaffController;
use App\http\controllers\StudentController;
use App\http\controllers\ApproveJoinController;

use App\http\controllers\staff\UserController as StaffUserController;

use App\http\controllers\lecturer\EventController as LecturerEventController;
use App\http\controllers\lecturer\UserController as LecturerUserController;
use App\http\controllers\lecturer\JoinEventController as LecturerJoinEventController;

use App\http\controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('home');
});

Route::group(['middleware' => 'lecturer','prefix' => 'lecturer', 'as' => 'lecturer.'], function () {
    Route::resource('event', LecturerEventController::class);
    Route::delete('remove/{event}', [LecturerEventController::class, 'remove'])->name('event.remove');
    Route::resource('user', LecturerUserController::class);
    Route::resource('join', LecturerJoinEventController::class);
    Route::post('join/group', [LecturerJoinEventController::class, 'join'])->name('join.group');
});

Route::group(['middleware' => 'admin','prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('lecturer', LecturerController::class);

    Route::resource('individual', IndividualEventController::class);
    Route::post('individual/approve', [IndividualEventController::class, 'approve'])->name('individual.approve');
    Route::post('individual/reject', [IndividualEventController::class, 'reject'])->name('individual.reject');
    Route::post('individual/revise', [IndividualEventController::class, 'revise'])->name('individual.revise');

    Route::resource('group', GroupEventController::class);
    Route::post('group/open', [GroupEventController::class, 'open'])->name('group.open');
    Route::post('group/close', [GroupEventController::class, 'close'])->name('group.close');

    Route::resource('join', ApproveJoinController::class);
    Route::post('join/{id}/acceptStudent', [ApproveJoinController::class, 'acceptStudent'])->name('join.acceptStudent');
    Route::post('join/{id}/rejectStudent', [ApproveJoinController::class, 'rejectStudent'])->name('join.rejectStudent');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');
