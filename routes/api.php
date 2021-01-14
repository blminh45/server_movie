<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\KhachHang;

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
    Route::get('danh-sach-rap', 'ApiController@danh-sach-rap')->name('danh-sach-rap');
});

Route::group(['prefix'=>'ajax'], function() {
    Route::get('danh-sach-phim', 'AjaxController@danh_sach_phim')->name('danh-sach-phim');
    Route::post('them-phim', 'AjaxController@ThemPhim')->name('them-phim');
    Route::post('cap-nhat-phim', 'AjaxController@CapNhatPhim')->name('cap-nhat-phim');
    Route::get('phim', 'AjaxController@GetPhim')->name('phim');
    Route::post('xoa-phim', 'AjaxController@XoaPhim')->name('xoa-phim');
});