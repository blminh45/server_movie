<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    protected $table='ves';
    protected $fillable = ['id','id_lich_chieu','id_khach_hang','id_ghe','trang_thai'];

    public function khach_hang()
    {
        return $this->belongsTo('App\KhachHang','id_khach_hang','id');
    }

    public function Ghe(){
        return $this->belongsTo('App\Ghe','id_ghe','id');
    }
    
    public function LichChieu(){
        return $this->belongsTo('App\lichChieu','id_lich_chieu','id');
    }
}
