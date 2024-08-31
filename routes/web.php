<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ChatController;

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

Route::group(['middleware' => ['auth']], function(){
Route::get('/index', [PostController::class, 'index'])->name('index')->middleware('auth');;
Route::get('/posts/create', [PostController::class, 'create']);
//jsのfetchメソッドで'/post/like'としているため、ルーティングも以下のように'/post/like'とします。
Route::post('/post/like', [LikeController::class, 'likePost']);
Route::get('/posts/{post}', [PostController::class ,'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class,'delete']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/user', [UserController::class, 'user'])->name('user');

Route::get('/category/{category}', [CategoryController::class, 'category']);

Route::get('/comments/{comment}', [CommentController::class, 'comment']);
Route::delete('/comments/{comment}', [CommentController::class,'delete']);

Route::get('/user/edit', [UserEditController::class, 'user_edit']);
Route::put('/user/edit', [UserEditController::class, 'update']);
Route::post('/user', [UserEditController::class, 'store']);

Route::get('/posts/user/{post}', [PostController::class, 'post_user']);
Route::post('/chat', [ChatController::class, 'sendMessage']);
Route::get('/chat/{user}', [ChatController::class, 'openChat']);



require __DIR__.'/auth.php';
