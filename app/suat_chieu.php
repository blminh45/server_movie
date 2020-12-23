<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suat_chieu extends Model
{
    protected $table='suat_chieus';
    protected $fillable = ['id','id_rap','id_phim','ngay_chieu','gio_chieu','trang_thai'];

    public function ve() {
        return $this->belongsTo('App\ve', 'id_suat_chieu', 'id');
    }
}
