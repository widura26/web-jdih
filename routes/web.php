<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminController;

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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::group(['prefix' => 'home/'], function () {
    Route::get('/homepage', [HomeController::class, 'homepageView'])->name('homepageView'); 
    Route::get('/detail', [HomeController::class, 'detailView'])->name('detailView'); 
});

Route::group(['prefix' => 'admin/'], function () {
    Route::get('/dashboard',[AdminController::class, 'dashboardView'])->name('dashboardView'); 
    
});

