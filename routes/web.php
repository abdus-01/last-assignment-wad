<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/users', [AdminController::class, 'user']);
Route::get('/adduser', [AdminController::class, 'adduser']);
Route::post('/users', [AdminController::class, 'store']);
Route::get('/edituser/{id}', [AdminController::class, 'edituser']);
Route::post('/update/{id}', [AdminController::class, 'update']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
Route::post('/uploadfood', [AdminController::class, 'upload']);
Route::get('/deletefood/{id}', [AdminController::class, 'deletefood']);
Route::get('/updateview/{id}', [AdminController::class, 'updateview']);
Route::post('/updatefood/{id}', [AdminController::class, 'updatefood']);

Route::post('/reserve', [AdminController::class, 'reserve']);
Route::get('/viewreserve', [AdminController::class, 'viewreserve']);
Route::get('/deletereserve/{id}', [AdminController::class, 'deletereserve']);
Route::get('/updatereserve/{id}', [AdminController::class, 'updatereserve']);
Route::post('/editreserve/{id}', [AdminController::class, 'editreserve']);

Route::get('/viewchef', [AdminController::class, 'viewchef']);
Route::post('/uploadchef', [AdminController::class, 'uploadchef']);
Route::get('/updatechef/{id}', [AdminController::class, 'updatechef']);
Route::post('/editchef/{id}', [AdminController::class, 'editchef']);
Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);
Route::get('/vieworders', [AdminController::class, 'vieworders']);
Route::get('/search', [AdminController::class, 'search']);

Route::get('/redirects', [HomeController::class, 'redirects']);
Route::post('/addcart/{id}', [HomeController::class, 'addcart']);
Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
Route::get('/deletecart/{id}', [HomeController::class, 'deletecart']);
Route::post('/confirm', [HomeController::class, 'confirm']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
