<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khach_hang extends Model
{
    //hasn\many
    //protected $table = 'KhachHang';
    protected $fillable = ['id','ten','dia_chi','so_dien_thoai','email','gioi_tinh','anh_dai_dien','mat_khau','trang_thai'];
}
