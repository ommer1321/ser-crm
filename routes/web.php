<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/home/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index.home');

Route::get('/tasks', [App\Http\Controllers\Teacher\Task\TaskController::class, 'index'])->name('index.task');
Route::get('/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'detail'])->name('details.task');

Route::post('/store', [App\Http\Controllers\Teacher\Task\TaskController::class, 'store'])->name('store.task');
Route::put('/delete/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'delete'])->name('delete.task');
Route::put('/update/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'update'])->name('update.task');

});




