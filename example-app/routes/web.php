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
    return view('home1');
});



Route::match(['GET','POST'],'/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('/',[\App\Http\Controllers\Client\ClientController::class,'index'])->name('logout');

Route::get('/bill/create', [App\Http\Controllers\BillController::class, 'create'])->name('bill.create');
Route::post('/bill', [App\Http\Controllers\BillController::class, 'store'])->name('bill.store');

Route::middleware(['auth','check.role'])->group(function(){

    Route::get('/admin', function () {
        return view('style1');
    });

//loại phòng 
Route::get('/list',[App\Http\Controllers\LoaiPhongController::class,'index'])->name('route_loaiphong_index');
Route::match(['GET','POST'],'/add',[App\Http\Controllers\LoaiPhongController::class,'add'])->name('route_loaiphong_add');
Route::match(['GET','POST'],'/edit/{id}',[App\Http\Controllers\LoaiPhongController::class,'edit'])->name('route_loaiphong_edit');
Route::get('/delete/{id}',[App\Http\Controllers\LoaiPhongController::class,'delete'])->name('route_loaiphong_delete');

//phòng 
Route::get('/phong',[App\Http\Controllers\PhongController::class,'index'])->name('route_phong_index');
Route::match(['GET','POST'],'/addp',[App\Http\Controllers\PhongController::class,'addp'])->name('route_phong_add');
Route::match(['GET','POST'],'/editp/{id}',[App\Http\Controllers\PhongController::class,'editp'])->name('route_phong_edit');
Route::get('/deletep/{id}',[App\Http\Controllers\PhongController::class,'deletep'])->name('route_phong_delete');

//người dùng
Route::get('/account',[\App\Http\Controllers\Auth\SignController::class,'index'])->name('route_account');
Route::match(['GET', 'POST'],'/account/edit/{id}',[\App\Http\Controllers\Auth\SignController::class,'edit'])->name('route_account_edit');   
Route::get('/account/delete/{id}',[\App\Http\Controllers\Auth\SignController::class,'delete'])->name('route_account_delete');
});

