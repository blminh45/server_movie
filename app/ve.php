<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ve extends Model
{
    protected $table='ves';
    protected $fillable = ['id','id_suat_chieu','id_khach_hang','trang_thai'];
    public $timestamps = false;

    public function khach_hang()
    {
        return $this->belongsTo('App\khach_hang','id_khach_hang','id');
    }

    public function Ghe(){
        return $this->belongsTo('App\ghe','id_ghe','id');
    }
    
    public function LichChieu(){
        return $this->belongsTo('App\lichChieu','id_lich_chieu','id');
    }
}
