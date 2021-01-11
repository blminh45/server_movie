<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhSachGhe extends Model
{
    protected $table='danh_sach_ghes';
    protected $fillable = ['id_ghe','id_rap','trang_thai'];
}
