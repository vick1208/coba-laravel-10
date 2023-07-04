<?php

use App\Http\Controllers\HelloController;
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

Route::view('/', 'welcome');

Route::get('/home', function(){
    return "Ini homepage";
});

Route::get('/pzn', function () {
    return 'Hello Programmer Zaman Now';
});

Route::get('/welcome',function () {
    return view('welcome');
});

Route::get('/hello',[HelloController::class,"hello"]);
