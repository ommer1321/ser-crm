<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\Calendar\CalendarController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//Auth Contol
Route::group(['middleware' => ['auth','isRole']], function () {


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index.home');






// Friendship Route
Route::get('/friend', [App\Http\Controllers\Friendship\FriendshipController::class, 'index'])->name('index.friendship');
Route::post('/friend/add', [App\Http\Controllers\Friendship\FriendshipController::class, 'add'])->name('add.friendship');
Route::get('/my-friends', [App\Http\Controllers\Friendship\FriendshipController::class, 'myFriends'])->name('myfriends.friendship');
Route::delete('/friend/delete/{user_name}', [App\Http\Controllers\Friendship\FriendshipController::class, 'delete'])->name('delete.friendship');

Route::get('/request-box', [App\Http\Controllers\Friendship\FriendshipController::class, 'requestBox'])->name('request-box.friendship');
Route::post('/request-box/add', [App\Http\Controllers\Friendship\FriendshipController::class, 'requestBoxCheck'])->name('request-box-check.friendship');





// Calendar Route
Route::group(['prefix' => 'calendar'], function () {

Route::get('/', [App\Http\Controllers\Teacher\Calendar\CalendarController::class, 'index'])->name('index.calendar');
Route::get('/api', [App\Http\Controllers\Teacher\Calendar\CalendarController::class, 'api'])->name('api.calendar');

});





// Task Route
Route::group(['prefix' => 'tasks'], function () {

Route::get('/', [App\Http\Controllers\Teacher\Task\TaskController::class, 'index'])->name('index.task');
Route::get('/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'detail'])->name('details.task');
Route::post('/store', [App\Http\Controllers\Teacher\Task\TaskController::class, 'store'])->name('store.task');
Route::put('/delete/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'delete'])->name('delete.task');
Route::put('/update/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'update'])->name('update.task');

});








// Grup Route
Route::group(['prefix' => 'grup'], function () {

    Route::get('/', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'index'])->name('index.grup');
    Route::get('/create', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'create'])->name('create.grup');
    Route::get('/settings/{grup_id}', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'settings'])->name('settings.grup');
    Route::post('/store', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'store'])->name('store.grup');
    Route::put('/update/{grup_id}', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'update'])->name('update.grup');

});





});




