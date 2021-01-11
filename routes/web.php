<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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


// Route::get('/', function () {
//     return view('pages.trang-chu');
// });

Route::get('/', function () {
    return view('pages.trang-chu');
})->middleware('checklogin');

Route::get('/login', function () {
    
    return view('pages.dang-nhap');
});
Route::post('/login','HomeController@DangNhap');

Route::get('/logout','HomeController@DangXuat');




Route::group(['prefix' => 'pages','middleware'=>'checklogin'], function() {
    Route::group(['prefix' => 'phim'], function () {
        Route::get('danh-sach-phim', 'HomeController@danh_sach_phim')->name('danh-sach-phim');

        Route::get('them-phim', 'HomeController@them_phim')->name('them-phim');
        Route::post('them-phim', 'HomeController@ThemPhim')->name('them-phim');

        Route::get('cap-nhat-phim/{id}', 'HomeController@cap_nhat_phim')->name('cap-nhat-phim/{id}');
        Route::post('cap-nhat-phim/{id}', 'HomeController@SuaPhim')->name('cap-nhat-phim/{id}');
    });

    Route::group(['prefix' => 'rap-phim','middleware'=>'checklogin'], function () {
        Route::get('danh-sach-rap', 'HomeController@danh_sach_rap')->name('danh-sach-rap');

        Route::get('them-rap', 'HomeController@them_rap')->name('them-rap');
        Route::post('them-rap', 'HomeController@ThemRap')->name('them-rap');

        Route::get('cap-nhat-rap/{id}', 'HomeController@cap_nhat_rap')->name('cap-nhat-rap/{id}');
        Route::post('cap-nhat-rap/{id}', 'HomeController@SuaRap')->name('cap-nhat-rap/{id}');
    });

    Route::group(['prefix' => 'chi-nhanh','middleware'=>'checklogin'], function () {
        Route::get('danh-sach-chinhanh', 'HomeController@danh_sach_chinhanh')->name('danh-sach-chinhanh');

        Route::get('them-chinhanh', 'HomeController@them_chinhanh')->name('them-chinhanh');
        Route::post('them-chinhanh', 'HomeController@ThemChiNhanh')->name('them-chinhanh');

        Route::get('cap-nhat-chi-nhanh/{id}', 'HomeController@cap_nhat_chinhanh')->name('cap-nhat-chi-nhanh/{id}');
        Route::post('cap-nhat-chi-nhanh/{id}', 'HomeController@SuaChiNhanh')->name('cap-nhat-chi-nhanh/{id}');
    });

    Route::group(['prefix' => 'thanh-vien', 'middleware'=>'checklogin'], function () {
        Route::get('danh-sach-thanh-vien', 'HomeController@danh_sach_thanh_vien')->name('danh-sach-thanh-vien');

        Route::get('them-thanhvien', 'HomeController@them_khachhang')->name('them-thanhvien');
        Route::post('them-thanhvien', 'HomeController@ThemKhachHang')->name('them-thanhvien');

        Route::get('cap-nhat-thanhvien/{id}', 'HomeController@cap_nhat_thanhvien')->name('cap-nhat-thanhvien/{id}');
        Route::post('cap-nhat-thanhvien/{id}', 'HomeController@SuaKhachHang')->name('cap-nhat-thanhvien/{id}');
    });

    Route::group(['prefix' => 'the-loai', 'middleware'=>'checklogin'], function () {
        Route::get('danh-sach-theloai', 'HomeController@danh_sach_theloai')->name('danh-sach-theloai');

        Route::get('them-theloai', 'HomeController@them_theloai')->name('them-theloai');
        Route::post('them-theloai', 'HomeController@ThemTheLoai')->name('them-theloai');

        Route::get('cap-nhat-theloai/{id}', 'HomeController@cap_nhat_theloai')->name('cap-nhat-theloai/{id}');
        Route::post('cap-nhat-theloai/{id}', 'HomeController@SuaTheLoai')->name('cap-nhat-theloai/{id}');
    });

    Route::group(['prefix' => 'suat-chieu','middleware'=>'checklogin'], function () {
        Route::get('danh-sach-suatchieu', 'HomeController@danh_sach_suatchieu')->name('danh-sach-suatchieu');

        Route::get('them-suatchieu', 'HomeController@them_suatchieu')->name('them-suatchieu');
        Route::post('them-suatchieu', 'HomeController@ThemSuatChieu')->name('them-suatchieu');
    });
});