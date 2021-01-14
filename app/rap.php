<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rap extends Model
{
    protected $table='raps';
    protected $fillable = ['id', 'ten_rap', 'so_luong_ghe','id_chi_nhanh','trang_thai'];

    public function chi_nhanh() {
        return $this->belongsTo('App\chi_nhanh', 'id_chi_nhanh', 'id');
    }

    public function ghe() {
        return $this->belongsToMany('App\ghe','d_s_ghes', 'id_rap', 'id_ghe');
    }

    public function lich_chieu(){
        return $this->hasMany('App\lich_chieu','id_rap','id');
    }
}
