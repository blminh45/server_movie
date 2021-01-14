<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suat_chieu extends Model
{
    protected $table='suat_chieus';
    protected $fillable = ['id','id_rap','id_phim','ngay_chieu','gio_chieu','trang_thai'];

    public function lich_chieu(){
        return $this->hasMany('App\lich_chieu','id_suat_chieu','id');
    }
}
