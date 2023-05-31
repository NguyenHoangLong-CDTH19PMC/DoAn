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


Route::get('/', function () { return view('./user/index'); })->name('trang-chu-user');
Route::get('/user/detail', function () { return view('./user/detail'); });

Route::get('user',[ReturnTpl::class,'Return_tpluser']);

Route::get('admin',[ReturnTpl::class,'Return_tpladmin'])->name('trang-chu-admin');


Route::get('/admin/product',[ProductController::class,'getproducts'])->name('san-pham-admin');
Route::get('/admin/product/add-product',[ProductController::class,'Return_tpladm_addpro'])->name('them-moi-san-pham-admin');
Route::post('/admin/product/add-product', [ProductController::class, 'addproducts'])->name('xl-them-moi-san-pham-admin');
Route::get('/admin/product/edit-product&id={id}',[ProductController::class,'Return_tpladm_editpro'])->name('sua-doi-san-pham-admin');
Route::post('/admin/product/edit-product&id={id}', [ProductController::class, 'editproducts'])->name('xl-sua-doi-san-pham-admin');
Route::get('/admin/product/delete-product&id={id}', [ProductController::class, 'deleteproducts'])->name('xl-xoa-bo-san-pham-admin');