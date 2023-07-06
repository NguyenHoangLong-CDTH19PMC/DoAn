<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReturnTpl;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\LoginCotroller;
use App\Http\Controllers\ArticleCotroller;
use App\Http\Controllers\TypeArticleCotroller;
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


Route::get('/login-admin', [LoginCotroller::class, 'index_login'])->name('dang-nhap-admin');
Route::post('/login-admin', [LoginCotroller::class, 'xlLoginAdmin'])->name('xl-dang-nhap-admin');
Route::get('/logout', [LoginCotroller::class, 'xlLogoutAdmin'])->name('xl-logout-admin');

Route::group(['middleware' => ['checkauth:admin']], function () {

    Route::get('admin', [ReturnTpl::class, 'index_admin'])->name('trang-chu-admin');
    Route::get('/update-info/id={id}', [LoginCotroller::class, 'index_update'])->name('suadoi-thongtin-admin');
    Route::post('/update-info/id={id}', [LoginCotroller::class, 'xl_update_info'])->name('xl-suadoi-thongtin-admin');

    Route::get('/change-password/id={id}', [LoginCotroller::class, 'index_change'])->name('doi-matkhau-admin');
    Route::post('/change-password/id={id}', [LoginCotroller::class, 'xl_change_password'])->name('xl-doi-matkhau-admin');

    Route::get('/admin/product/', [ProductController::class, 'index_product'])->name('san-pham-admin');
    Route::get('/admin/product/search/{keyword}', [ProductController::class, 'searchProductAdmin'])->name('tim-kiem-product');
    Route::get('/admin/product/add-product', [ProductController::class, 'index_addpro'])->name('them-moi-san-pham-admin');
    Route::post('/admin/product/add-product', [ProductController::class, 'addproducts'])->name('xl-them-moi-san-pham-admin');
    Route::get('/admin/product/modify-product/id={id}', [ProductController::class, 'index_modifypro'])->name('sua-doi-san-pham-admin');
    Route::post('/admin/product/modify-product/id={id}', [ProductController::class, 'modifyproducts'])->name('xl-sua-doi-san-pham-admin');
    Route::get('/admin/product/delete-product', [ProductController::class, 'deleteproducts'])->name('xl-xoa-bo-san-pham-admin');
    Route::get('/admin/remove', [ProductController::class, 'removeFormGallery'])->name('xl-xoa-hinhcon-admin');


    Route::get('/admin/brand', [ProductController::class, 'index_brand'])->name('sanpham-lv1-admin');
    Route::get('/admin/brand/search/{keyword}', [ProductController::class, 'searchBrandAdmin'])->name('tim-kiem-brand');
    Route::get('/admin/brand/add-brand', [ProductController::class, 'index_addbrand'])->name('themmoi-sanpham-lv1-admin');
    Route::post('/admin/brand/add-brand', [ProductController::class, 'addlevel1'])->name('xl-themmoi-sanpham-lv1-admin');
    Route::get('/admin/brand/modify-brand/id={id}', [ProductController::class, 'index_modifybrand'])->name('suadoi-sanpham-lv1-admin');
    Route::post('/admin/brand/modify-brand/id={id}', [ProductController::class, 'modifylevel1'])->name('xl-suadoi-sanpham-lv1-admin');
    Route::get('/admin/brand/delete-brand', [ProductController::class, 'deletelevel1'])->name('xl-xoabo-sanpham-lv1-admin');

    Route::get('/admin/type', [ProductController::class, 'index_type'])->name('sanpham-lv2-admin');
    Route::get('/admin/type/search/{keyword}', [ProductController::class, 'searchTypeAdmin'])->name('tim-kiem-type');
    Route::get('/admin/type/add-type', [ProductController::class, 'index_addtype'])->name('themmoi-sanpham-lv2-admin');
    Route::post('/admin/type/add-type', [ProductController::class, 'addlevel2'])->name('xl-themmoi-sanpham-lv2-admin');
    Route::get('/admin/type/modify-type/id={id}', [ProductController::class, 'index_modifytype'])->name('suadoi-sanpham-lv2-admin');
    Route::post('/admin/type/modify-type/id={id}', [ProductController::class, 'modifylevel2'])->name('xl-suadoi-sanpham-lv2-admin');
    Route::get('/admin/type/delete-type', [ProductController::class, 'deletelevel2'])->name('xl-xoabo-sanpham-lv2-admin');

    Route::get('/admin/color', [ColorController::class, 'getcolors'])->name('mau-sac-admin');
    Route::get('/admin/color/search/{keyword}', [ColorController::class, 'searchColorAdmin'])->name('tim-kiem-color');
    Route::get('/admin/color/add-color', [ColorController::class, 'Return_tpladm_addcolor'])->name('them-moi-mau-sac-admin');
    Route::post('/admin/color/add-color', [ColorController::class, 'addColor'])->name('xl-them-moi-mau-sac-admin');
    Route::get('/admin/color/modify-color/id={id}', [ColorController::class, 'Return_tpladm_modifycolor'])->name('sua-doi-mau-sac-admin');
    Route::post('/admin/color/modify-color/id={id}', [ColorController::class, 'modifyColor'])->name('xl-sua-doi-mau-sac-admin');
    Route::get('/admin/color/delete-color', [ColorController::class, 'deleteColor'])->name('xl-xoa-bo-mau-sac-admin');

    Route::get('/admin/size', [ColorController::class, 'getsizes'])->name('kich-thuoc-admin');
    Route::get('/admin/size/search/{keyword}', [ColorController::class, 'searchSizeAdmin'])->name('tim-kiem-size');
    Route::get('/admin/size/add-size', [ColorController::class, 'Return_tpladm_addsize'])->name('them-moi-kich-thuoc-admin');
    Route::post('/admin/size/add-size', [ColorController::class, 'addSize'])->name('xl-them-moi-kich-thuoc-admin');
    Route::get('/admin/size/modify-size/id={id}', [ColorController::class, 'Return_tpladm_modifysize'])->name('sua-doi-kich-thuoc-admin');
    Route::post('/admin/size/modify-size/id={id}', [ColorController::class, 'modifySize'])->name('xl-sua-doi-kich-thuoc-admin');
    Route::get('/admin/size/delete-size', [ColorController::class, 'deleteSize'])->name('xl-xoa-bo-kich-thuoc-admin');

    Route::get('/admin/article',[ArticleCotroller::class,'getsnew'])->name('bai-viet-admin');
    Route::get('/admin/article/search/{keyword}', [ArticleCotroller::class, 'searchArticleAdmin'])->name('tim-kiem-article');
    Route::get('/admin/article/add-new',[ArticleCotroller::class,'Return_tpladm_addnew'])->name('them-moi-bai-viet-admin');
    Route::post('/admin/article/add-new', [ArticleCotroller::class, 'addnews'])->name('xl-them-moi-bai-viet-admin');
    Route::get('/admin/article/modify-new/id={id}',[ArticleCotroller::class,'Return_tpladm_modifynew'])->name('sua-doi-bai-viet-admin');
    Route::post('/admin/article/modify-new/id={id}', [ArticleCotroller::class, 'modifynews'])->name('xl-sua-doi-bai-viet-admin');
    Route::get('/admin/article/delete-new', [ArticleCotroller::class, 'deletenews'])->name('xl-xoa-bo-bai-viet-admin');

    Route::get('/admin/articletype',[TypeArticleCotroller::class,'getsnewtype'])->name('loai-bai-viet-admin');
    Route::get('/admin/articletype/search/{keyword}', [TypeArticleCotroller::class, 'searchTypeArticle'])->name('tim-kiem-type-article');
    Route::get('/admin/articletype/add-newtype',[TypeArticleCotroller::class,'Return_tpladm_addnewtype'])->name('them-moi-loai-bai-viet-admin');
    Route::post('/admin/articletype/add-newtype', [TypeArticleCotroller::class, 'addnewstype'])->name('xl-them-moi-loai-bai-viet-admin');
    Route::get('/admin/articletype/modify-newtype/id={id}',[TypeArticleCotroller::class,'Return_tpladm_modifynewtype'])->name('sua-doi-loai-bai-viet-admin');
    Route::post('/admin/articletype/modify-newtype/id={id}', [TypeArticleCotroller::class, 'modifynewtypes'])->name('xl-sua-doi-loai-bai-viet-admin');
    Route::get('/admin/articletype/delete-newtype', [TypeArticleCotroller::class, 'deletenewtypes'])->name('xl-xoa-bo-loai-bai-viet-admin');

    Route::get('/admin/status', [ProductController::class, 'setStatus'])->name('set-trang-thai-sp');
});


Route::get('/login-user', [LoginCotroller::class, 'index_login_user'])->name('dang-nhap-user');
Route::post('/login-user', [LoginCotroller::class, 'xlLoginUser'])->name('xl-dang-nhap-user');
Route::get('/', [ProductController::class, 'GetProductIndex'])->name('trang-chu-user');
Route::get('/product', [ProductController::class, 'GetProductPage'])->name('lay-ds-product');
Route::get('/search/{keyword}', [ProductController::class, 'SearchProduct'])->name('tim-kiem');
Route::get('/detail/id={id}', [ProductController::class, 'GetDetailProduct'])->name('chi-tiet-product');
Route::get('/cart', [ProductController::class, 'viewCart'])->name('lay-gio-hang');
Route::get('/addcart', [ProductController::class, 'addToCart'])->name('xl-them-giohang');
Route::get('/remove', [ProductController::class, 'removeFromCart'])->name('xl-xoa-giohang');