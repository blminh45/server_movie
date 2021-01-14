<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danh_sach_ghe extends Model
{
    protected $table='danh_sach_ghes';
    protected $fillable = ['id_ghe','id_rap','trang_thai'];
}
