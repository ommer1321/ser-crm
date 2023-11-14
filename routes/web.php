<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\Calendar\CalendarController;
use App\Http\Controllers\Teacher\Task\TaskCommentController;

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


Route::get('/program', function () {
    return view('program.index');
});







// deneme yuakreısı









//Auth Contol
Route::group(['middleware' => ['auth', 'isRole']], function () {




   // Notifications Route
   Route::group(['prefix' => 'notifications'], function () {


Route::get('/', [App\Http\Controllers\Notification\NotificationController::class, 'index'])->name('index.notification');
Route::post('/mark', [App\Http\Controllers\Notification\NotificationController::class, 'mark'])->name('mark.notification');
Route::post('/mark-one', [App\Http\Controllers\Notification\NotificationController::class, 'markOne'])->name('mark-one.notification');


});












    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index.home');




    // Friendship Route
    Route::group(['prefix' => 'friend', 'middleware' => ['auth', 'role:teacher|student']], function () {

        Route::get('/', [App\Http\Controllers\Friendship\FriendshipController::class, 'index'])->name('index.friendship');
        Route::post('/add', [App\Http\Controllers\Friendship\FriendshipController::class, 'add'])->name('add.friendship');
        Route::get('/my-friends', [App\Http\Controllers\Friendship\FriendshipController::class, 'myFriends'])->name('myfriends.friendship');
        Route::delete('/delete/{user_name}', [App\Http\Controllers\Friendship\FriendshipController::class, 'delete'])->name('delete.friendship');

        Route::group(['prefix' => 'istek-kutusu'], function () {
            Route::get('/', [App\Http\Controllers\Friendship\FriendshipController::class, 'requestBox'])->name('request-box.friendship');
            Route::post('/add', [App\Http\Controllers\Friendship\FriendshipController::class, 'requestBoxCheck'])->name('request-box-check.friendship');
        });
    });



    // Calendar Route
    Route::group(['prefix' => 'calendar'], function () {

        Route::get('/', [App\Http\Controllers\Teacher\Calendar\CalendarController::class, 'index'])->name('index.calendar');
        Route::get('/api', [App\Http\Controllers\Teacher\Calendar\CalendarController::class, 'api'])->name('api.calendar');
    });

 


    // Task Route
    Route::group(['prefix' => 'tasks', 'middleware' => ['auth', 'role:teacher|student']], function () {

        Route::get('/', [App\Http\Controllers\Teacher\Task\TaskController::class, 'index'])->name('index.task');
        Route::get('/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'detail'])->name('details.task');
        Route::post('/store', [App\Http\Controllers\Teacher\Task\TaskController::class, 'store'])->name('store.task');
        Route::put('/delete/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'delete'])->name('delete.task');
        Route::put('/update/{task_id}', [App\Http\Controllers\Teacher\Task\TaskController::class, 'update'])->name('update.task');

        Route::post('/status/update', [App\Http\Controllers\Teacher\Task\TaskController::class, 'updateAnswer'])->name('update.answer.task');


        // Task Comment Route
        Route::group(['prefix' => 'comment'], function () {

            Route::post('store', [App\Http\Controllers\Teacher\Task\TaskCommentController::class, 'store'])->name('store.comment.task');

            Route::group(['middleware' => ['auth', 'role:teacher']], function () {

                Route::post('delete', [App\Http\Controllers\Teacher\Task\TaskCommentController::class, 'delete'])->name('delete.comment.task');
                Route::post('pim', [App\Http\Controllers\Teacher\Task\TaskCommentController::class, 'pim'])->name('pim.comment.task');
            });
        });
    });








    // Grup Route
    Route::group(['prefix' => 'grup/', 'middleware' => ['auth', 'role:teacher|student']], function () {

        Route::get('list/', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'listGrups'])->name('list.grup');

        // grup index
        Route::get('/{grup_id}', [App\Http\Controllers\Teacher\Grup\GrupMainPageController::class, 'index'])->name('index.mainpage.grup');

        //Settings Route 
        Route::group(['prefix' => 'settings', 'middleware' => ['auth', 'role:teacher']], function () {

            Route::get('/create', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'create'])->name('create.grup');
            Route::post('/store', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'store'])->name('store.grup');
            Route::get('/{grup_id}', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'settings'])->name('settings.grup');
            Route::put('/update/Profile-Photo/{grup_id}', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'updateGroupPhoto'])->name('update.profile-photo.grup');
            Route::put('/update/Info/{grup_id}', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'updateGroupInfo'])->name('update.info.grup');
        });


        //Member Route 
        Route::group(['prefix' => 'member'], function () {

            Route::get('/{grup_id}', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'members'])->name('members.grup');
            Route::post('/delete', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'deleteMember'])->name('delete.members.grup');
            Route::post('/add', [App\Http\Controllers\Teacher\Grup\GrupController::class, 'addMember'])->name('add.members.grup');
        });


        //   grup burdaydı

        //News Route 

        Route::group(['prefix' => 'comment', 'middleware' => ['auth', 'role:teacher|student']], function () {
            Route::post('/{grup_id}/store', [App\Http\Controllers\Teacher\Grup\GrupNewsCommentController::class, 'store'])->name('store.comment.news.grup');
        });

        Route::group(['prefix' => 'news', 'middleware' => ['auth', 'role:teacher|student']], function () {
            //  student ve teacher eklenecek gruba alınacak news
            Route::post('/{grup_id}/store', [App\Http\Controllers\Teacher\Grup\GrupNewsController::class, 'store'])->name('store.news.grup');
            Route::delete('/{grup_id}/delete', [App\Http\Controllers\Teacher\Grup\GrupNewsController::class, 'delete'])->name('delete.news.grup');
        });
    });
});
