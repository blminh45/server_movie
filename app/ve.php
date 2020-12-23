<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ve extends Model
{
    $table = "ves";
    protected $fillable = ['id','id_suat_chieu','id_khach_hang','trang_thai'];

    public function ve() {
        return $this->belongsTo('App\khach_hang', 'id_khach_hang', 'id');
    }

    public function suatchieu() {
        return $this->hasMany('App\suat_chieu', 'id_suat_chieu', 'id');
    }
}
