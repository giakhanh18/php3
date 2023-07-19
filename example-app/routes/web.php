<?php

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
    return view('home');
});

Route::get('/admin', function () {
    return view('style1');
});

Route::get('/list',[App\Http\Controllers\LoaiPhongController::class,'index'])->name('route_loaiphong_index');
Route::match(['GET','POST'],'/add',[App\Http\Controllers\LoaiPhongController::class,'add'])->name('route_loaiphong_add');
Route::match(['GET','POST'],'/edit/{id}',[App\Http\Controllers\LoaiPhongController::class,'edit'])->name('route_loaiphong_edit');
Route::get('/delete/{id}',[App\Http\Controllers\LoaiPhongController::class,'delete'])->name('route_loaiphong_delete');