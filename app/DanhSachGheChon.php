<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhSachGheChon extends Model
{
    protected $table='danh_sach_ghe_chons';
    protected $fillable = ['id_ghe','id_rap','id_lich_chieu','trang_thai'];

    public function LichChieu()
    {
        return $this->belongsTo('App\LichChieu','id_lich_chieu','id');
    }
}
