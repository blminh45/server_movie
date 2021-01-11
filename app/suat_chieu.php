<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suat_chieu extends Model
{
    protected $table='suat_chieus';
    protected $fillable = ['id','id_rap','id_phim','ngay_chieu','gio_chieu','trang_thai'];
    
    public function LichChieu(){
        return $this->hasMany('App\LichChieu','id_suat_chieu','id');
    }
}
