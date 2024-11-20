<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
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
//Route::post('/UserRegistration', [UserController::class, 'UserRegistration']);
//Route::post('/UserLogin', [UserController::class, 'UserLogin']);
//Route::post('/SendOtpCode', [UserController::class, 'SendOtpCode']);
//Route::post('/VerifyOtp', [UserController::class, 'VerifyOtp']);
//Route::post('/ResetPassword', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
//Route::post('/UserLogOut', [UserController::class, 'UserLogOut']);
////Category
//Route::get('/category',[CategoryController::class,'CategoryList']);
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[BlogController::class,'index'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/login',[UserController::class,'LoginPage']);
Route::get('/register',[UserController::class,'RegisterPage']);
Route::get('/send-otp',[UserController::class,'sendOtpPage']);

//dashboard
Route::get('/home', [BlogController::class,'dashboard_page'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/post',function (){
    return view('post');
})->middleware([TokenVerificationMiddleware::class]);
Route::get('/addpost',function (){
    return view('addPost');
});
