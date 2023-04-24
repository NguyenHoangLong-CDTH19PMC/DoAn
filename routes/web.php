<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReturnTpl;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () { return view('./user/index'); });
Route::get('/user/detail', function () { return view('./user/detail'); });

Route::get('user',[ReturnTpl::class,'Return_tpluser']);

Route::get('admin',[ReturnTpl::class,'Return_tpladmin'])->name('trang-chu');


Route::get('/admin/product',[ProductController::class,'products'])->name('san-pham');

Route::get('/admin/product/add-product',[ReturnTpl::class,'Return_tpladm_addpro'])->name('them-moi-san-pham');