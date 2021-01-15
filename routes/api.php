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

Route::get('/danh-sach-chi-nhanh', 'ApiController@danh_sach_the_loai')->name('danh-sach-chi-nhanh');

Route::group(['prefix'=>'rap-phim'], function (){
    Route::get('danh-sach-chi-nhanh', 'ApiController@danh_sach_chi_nhanh')->name('danh-sach-chi-nhanh');
    Route::get('danh-sach-rap', 'ApiController@danh_sach_rap')->name('danh-sach-rap');
    Route::get('danh-sach-ghe', 'ApiController@danh_sach_ghe')->name('danh-sach-ghe');
});

Route::get('/khach-hang', 'ApiController@DanhSachKhachHang')->name('khach-hang');
Route::post('/thanh-toan', 'ApiController@ThanhToan')->name('thanh-toan');
Route::post('/them-khach-hang','ApiController@them_kh')->name('them-khach-hang');

Route::group(['prefix'=>'ajax'], function() {
    Route::get('phim', 'AjaxController@GetPhim')->name('phim');
    Route::post('them-phim', 'AjaxController@ThemPhim')->name('them-phim');
    Route::post('cap-nhat-phim', 'AjaxController@CapNhatPhim')->name('cap-nhat-phim');
    Route::post('xoa-phim', 'AjaxController@XoaPhim')->name('xoa-phim');

    Route::get('chi-nhanh', 'AjaxController@GetChiNhanh')->name('chi-nhanh');
    Route::post('them-chi-nhanh', 'AjaxController@ThemChiNhanh')->name('them-chi-nhanh');
    Route::post('cap-nhat-chi-nhanh', 'AjaxController@CapNhatChiNhanh')->name('cap-nhat-chi-nhanh');
    Route::post('xoa-chi-nhanh', 'AjaxController@XoaChiNhanh')->name('xoa-chi-nhanh');

    Route::get('rap', 'AjaxController@GetRap')->name('rap');
    Route::post('them-rap', 'AjaxController@ThemRap')->name('them-rap');
    Route::post('cap-nhat-rap', 'AjaxController@CapNhatRap')->name('cap-nhat-rap');
    Route::post('doi-trang-thai-rap', 'AjaxController@DoiTrangThaiRap')->name('doi-trang-thai-rap');

    Route::get('chi-nhanh', 'AjaxController@GetChiNhanh')->name('chi-nhanh');
    Route::post('them-chi-nhanh', 'AjaxController@ThemChiNhanh')->name('them-chi-nhanh');
    Route::post('cap-nhat-chi-nhanh', 'AjaxController@CapNhatChiNhanh')->name('cap-nhat-chi-nhanh');
    Route::post('xoa-chi-nhanh', 'AjaxController@XoaChiNhanh')->name('xoa-chi-nhanh');
});

Route::get('/khach-hang', 'ApiController@DanhSachKhachHang')->name('khach-hang');
Route::get('/them-khach-hang','ApiController@them_kh')->name('them-khach-hang');
Route::post('/thanh-toan', 'ApiController@ThanhToan')->name('thanh-toan');

//bank
Route::group(['prefix'=>'bank'], function() {
    Route::get('tai-khoan', 'BankController@ThongTinTaiKhoan')->name('tai-khoan');
    Route::get('thanh-toan', 'BankController@TruSoDu')->name('thanh-toan');
});