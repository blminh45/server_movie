<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danh_sach_chon_ghe extends Model
{
    protected $table='danh_sach_chon_ghes';
    protected $fillable = ['id_ghe','id_rap','id_lich_chieu','trang_thai'];

    public function LichChieu()
    {
        return $this->belongsTo('App\LichChieu','id_lich_chieu','id');
    }
}
