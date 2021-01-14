<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danh_sach_ghe_chon extends Model
{
    protected $table='danh_sach_ghe_chons';
    protected $fillable = ['id_ghe','id_rap','id_lich_chieu','trang_thai'];

    public function lich_chieu()
    {
        return $this->belongsTo('App\lich_chieu','id_lich_chieu','id');
    }
}
