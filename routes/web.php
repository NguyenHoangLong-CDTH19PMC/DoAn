<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReturnTpl;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\NewTypeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\LoginCotroller;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();
// Route::get('/', function () { return view('./user/index'); })->name('trang-chu-user');
Route::get('/', [ProductController::class, 'GetProductIndex'])->name('trang-chu-user');

Route::get('/login', [LoginCotroller::class, 'Return_tpladm_login'])->name('dang-nhap-admin');
Route::post('/login', [LoginCotroller::class, 'xlLogin'])->name('xl-dang-nhap-admin');


Route::get('admin',[ReturnTpl::class,'index_admin'])->name('trang-chu-admin');

Route::get('/admin/product',[ProductController::class,'index_product'])->name('san-pham-admin');
Route::get('/admin/product/add-product',[ProductController::class,'Return_tpladm_addpro'])->name('them-moi-san-pham-admin');
Route::post('/admin/product/add-product', [ProductController::class, 'index_addpro'])->name('xl-them-moi-san-pham-admin');
Route::get('/admin/product/modify-product/id={id}',[ProductController::class,'index_modifypro'])->name('sua-doi-san-pham-admin');
Route::post('/admin/product/modify-product/id={id}', [ProductController::class, 'modifyproducts'])->name('xl-sua-doi-san-pham-admin');
Route::get('/admin/product/delete-product', [ProductController::class, 'deleteproducts'])->name('xl-xoa-bo-san-pham-admin');

    Route::get('/admin/product/brand', [ProductController::class, 'index_brand'])->name('sanpham-lv1-admin');
    Route::get('/admin/product/add-brand', [ProductController::class, 'index_addbrand'])->name('themmoi-sanpham-lv1-admin');
    Route::post('/admin/product/add-brand', [ProductController::class, 'addlevel1'])->name('xl-themmoi-sanpham-lv1-admin');
    Route::get('/admin/product/modify-brand/id={id}', [ProductController::class, 'index_modifybrand'])->name('suadoi-sanpham-lv1-admin');
    Route::post('/admin/product/modify-brand/id={id}', [ProductController::class, 'modifylevel1'])->name('xl-suadoi-sanpham-lv1-admin');
    Route::get('/admin/product/delete-brand', [ProductController::class, 'deletelevel1'])->name('xl-xoabo-sanpham-lv1-admin');

    Route::get('/admin/product/type', [ProductController::class, 'index_type'])->name('sanpham-lv2-admin');
    Route::get('/admin/product/add-type', [ProductController::class, 'index_addtype'])->name('themmoi-sanpham-lv2-admin');
    Route::post('/admin/product/add-type', [ProductController::class, 'addlevel2'])->name('xl-themmoi-sanpham-lv2-admin');
    Route::get('/admin/product/modify-type/id={id}', [ProductController::class, 'index_modifytype'])->name('suadoi-sanpham-lv2-admin');
    Route::post('/admin/product/modify-type/id={id}', [ProductController::class, 'modifylevel2'])->name('xl-suadoi-sanpham-lv2-admin');
    Route::get('/admin/product/delete-type', [ProductController::class, 'deletelevel2'])->name('xl-xoabo-sanpham-lv2-admin');

    Route::get('/admin/color', [ColorController::class, 'getcolors'])->name('mau-sac-admin');
    Route::get('/admin/color/add-color', [ColorController::class, 'Return_tpladm_addcolor'])->name('them-moi-mau-sac-admin');
    Route::post('/admin/color/add-color', [ColorController::class, 'addColor'])->name('xl-them-moi-mau-sac-admin');
    Route::get('/admin/color/modify-color/id={id}', [ColorController::class, 'Return_tpladm_modifycolor'])->name('sua-doi-mau-sac-admin');
    Route::post('/admin/color/modify-color/id={id}', [ColorController::class, 'modifyColor'])->name('xl-sua-doi-mau-sac-admin');
    Route::get('/admin/color/delete-color', [ColorController::class, 'deleteColor'])->name('xl-xoa-bo-mau-sac-admin');

    Route::get('/admin/size', [ColorController::class, 'getsizes'])->name('kich-thuoc-admin');
    Route::get('/admin/size/add-size', [ColorController::class, 'Return_tpladm_addsize'])->name('them-moi-kich-thuoc-admin');
    Route::post('/admin/size/add-size', [ColorController::class, 'addSize'])->name('xl-them-moi-kich-thuoc-admin');
    Route::get('/admin/size/modify-size/id={id}', [ColorController::class, 'Return_tpladm_modifysize'])->name('sua-doi-kich-thuoc-admin');
    Route::post('/admin/size/modify-size/id={id}', [ColorController::class, 'modifySize'])->name('xl-sua-doi-kich-thuoc-admin');
    Route::get('/admin/size/delete-size', [ColorController::class, 'deleteSize'])->name('xl-xoa-bo-kich-thuoc-admin');

Route::get('/admin/status',[ProductController::class,'setStatus'])->name('set-trang-thai-sp');


Route::get('/admin/new',[NewController::class,'getsnew'])->name('bai-viet-admin');
Route::get('/admin/new/add-new',[NewController::class,'Return_tpladm_addnew'])->name('them-moi-bai-viet-admin');
Route::post('/admin/new/add-new', [NewController::class, 'addnews'])->name('xl-them-moi-bai-viet-admin');
Route::get('/admin/new/modify-new/id={id}',[NewController::class,'Return_tpladm_modifynew'])->name('sua-doi-bai-viet-admin');
Route::post('/admin/new/modify-new/id={id}', [NewController::class, 'modifynews'])->name('xl-sua-doi-bai-viet-admin');
Route::get('/admin/new/delete-new', [NewController::class, 'deletenews'])->name('xl-xoa-bo-bai-viet-admin');
// Route::post('/searchproduct',[ProductController::class,'searchproduct'])->name('searchproduct');

Route::get('/admin/newtype',[NewTypeController::class,'getsnewtype'])->name('loai-bai-viet-admin');
Route::get('/admin/new/add-newtype',[NewTypeController::class,'Return_tpladm_addnewtype'])->name('them-moi-loai-bai-viet-admin');
Route::post('/admin/new/add-newtype', [NewTypeController::class, 'addnewstype'])->name('xl-them-moi-loai-bai-viet-admin');
Route::get('/admin/newtype/modify-newtype/id={id}',[NewTypeController::class,'Return_tpladm_modifynewtype'])->name('sua-doi-loai-bai-viet-admin');
Route::post('/admin/newtype/modify-newtype/id={id}', [NewTypeController::class, 'modifynewtypes'])->name('xl-sua-doi-loai-bai-viet-admin');
Route::get('/admin/newtype/delete-newtype', [NewTypeController::class, 'deletenewtypes'])->name('xl-xoa-bo-loai-bai-viet-admin');
// Route::post('/searchproduct',[NewTypeController::class,'searchproduct'])->name('searchproduct');