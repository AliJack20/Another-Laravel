<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

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

Route::get('test', function() {

    \Illuminate\Support\Facades\Mail::to('alisiddiqui275@gmail.com')->send(
        new \App\Mail\JobPosted()
    );
    return 'Done';
} );

Route::view('/', 'home');
Route::view('/contact', 'contact');


Route::resource('jobs', JobController::class);

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::get('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);