<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'phim'], function (){
    Route::get('/danh-sach-phim', 'ApiController@danh_sach_phim')->name('danh-sach-phim');
    Route::get('/tim-phim/{id}', 'ApiController@tim_phim')->name('tim-phim');
    Route::post('/them-phim', 'ApiController@them_phim')->name('them-phim');
    Route::put('/sua-phim/{id}', 'ApiController@sua_phim')->name('sua-phim');
});

Route::get('/danh-sach-the-loai', 'ApiController@danh_sach_the_loai')->name('danh-sach-the-loai');

Route::group(['prefix'=>'rap-phim'], function (){
    Route::get('danh-sach-chi-nhanh', 'ApiController@danh_sach_chi_nhanh')->name('danh-sach-chi-nhanh');
    Route::get('danh-sach-rap', 'ApiController@danh_sach_rap')->name('danh-sach-rap');
    Route::get('danh-sach-ghe', 'ApiController@danh_sach_ghe')->name('danh-sach-ghe');
});

Route::group(['prefix'=>'ajax'], function() {
    Route::get('danh-sach-phim', 'AjaxController@danh_sach_phim')->name('danh-sach-phim');
    Route::post('them-phim', 'AjaxController@ThemPhim')->name('them-phim');
    Route::post('cap-nhat-phim', 'AjaxController@CapNhatPhim')->name('cap-nhat-phim');
    Route::get('phim', 'AjaxController@GetPhim')->name('phim');
    Route::post('xoa-phim', 'AjaxController@XoaPhim')->name('xoa-phim');
});

Route::get('/khach-hang', 'ApiController@DanhSachKhachHang')->name('khach-hang');
Route::post('/thanh-toan', 'ApiController@ThanhToan')->name('thanh-toan');