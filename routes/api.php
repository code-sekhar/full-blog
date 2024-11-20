<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/UserRegistration', [UserController::class, 'UserRegistration']);
Route::post('/UserLogin', [UserController::class, 'UserLogin']);
Route::post('/SendOtpCode', [UserController::class, 'SendOtpCode']);
Route::post('/VerifyOtp', [UserController::class, 'VerifyOtp']);
Route::post('/ResetPassword', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/UserLogOut', [UserController::class, 'UserLogOut']);
Route::get('/UserProfile', [UserController::class, 'userProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::put('/UserProfile', [UserController::class, 'userProfileUpdate'])->middleware([TokenVerificationMiddleware::class]);
//Category
Route::get('/category',[CategoryController::class,'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category',[CategoryController::class,'create'])->middleware([TokenVerificationMiddleware::class]);
Route::put('/category/{id}',[CategoryController::class,'edit'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/category/{id}',[CategoryController::class,'show'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/category/{id}',[CategoryController::class,'destroy'])->middleware([TokenVerificationMiddleware::class]);
//Blog Post
Route::post('/post',[PostController::class,'createPost'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/post',[PostController::class,'getAllPosts'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/post/{id}',[PostController::class,'getSinglePost'])->middleware([TokenVerificationMiddleware::class]);
Route::put('/post/{id}',[PostController::class,'updatePost'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('/post/{id}',[PostController::class,'deletePost'])->middleware([TokenVerificationMiddleware::class]);
//Post by Comment
Route::post('/comment/{id}',[CommentController::class,'addComment'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/comment/{id}',[CommentController::class,'getComments'])->middleware([TokenVerificationMiddleware::class]);
//Like Post
Route::post('/posts/{postId}/like',[LikeController::class,'toggleLike'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/posts/{postId}/like',[LikeController::class,'likeGet'])->middleware([TokenVerificationMiddleware::class]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

