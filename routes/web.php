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

// Route::get('user',[ReturnTpl::class,'Return_tpluser']);
Route::get('admin',[ReturnTpl::class,'Return_tpladmin'])->name('trang-chu-admin');

Route::get('/admin/product',[ProductController::class,'getproducts'])->name('san-pham-admin');
Route::get('/admin/product/add-product',[ProductController::class,'Return_tpladm_addpro'])->name('them-moi-san-pham-admin');
Route::post('/admin/product/add-product', [ProductController::class, 'addproducts'])->name('xl-them-moi-san-pham-admin');
Route::get('/admin/product/modify-product',[ProductController::class,'Return_tpladm_modifypro'])->name('sua-doi-san-pham-admin');
Route::post('/admin/product/modify-product', [ProductController::class, 'modifyproducts'])->name('xl-sua-doi-san-pham-admin');
Route::get('/admin/product/delete-product', [ProductController::class, 'deleteproducts'])->name('xl-xoa-bo-san-pham-admin');


Route::get('/admin/product/level1',[ProductController::class,'getproductlv1'])->name('sanpham-lv1-admin');
Route::get('/admin/product/add-level1',[ProductController::class,'Return_tpladm_addprolv1'])->name('themmoi-sanpham-lv1-admin');
Route::post('/admin/product/add-level1',[ProductController::class,'addlevel1'])->name('xl-themmoi-sanpham-lv1-admin');
Route::get('/admin/product/modify-level1',[ProductController::class,'Return_tpladm_modifylv1'])->name('suadoi-sanpham-lv1-admin');
Route::post('/admin/product/modify-level1', [ProductController::class, 'modifylevel1'])->name('xl-suadoi-sanpham-lv1-admin');
Route::get('/admin/product/delete-level1', [ProductController::class, 'deletelevel1'])->name('xl-xoabo-sanpham-lv1-admin');


Route::get('/admin/product/level2',[ProductController::class,'getproductlv2'])->name('sanpham-lv2-admin');
Route::get('/admin/product/add-level2',[ProductController::class,'Return_tpladm_addprolv2'])->name('themmoi-sanpham-lv2-admin');
Route::post('/admin/product/add-level2',[ProductController::class,'addlevel2'])->name('xl-themmoi-sanpham-lv2-admin');
Route::get('/admin/product/modify-level2',[ProductController::class,'Return_tpladm_modifylv2'])->name('suadoi-sanpham-lv2-admin');
Route::post('/admin/product/modify-level2', [ProductController::class, 'modifylevel2'])->name('xl-suadoi-sanpham-lv2-admin');
Route::get('/admin/product/delete-level2', [ProductController::class, 'deletelevel2'])->name('xl-xoabo-sanpham-lv2-admin');