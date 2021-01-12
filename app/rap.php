<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rap extends Model
{
    protected $table='raps';
    protected $fillable = ['id', 'ten_rap', 'so_luong_ghe','id_chi_nhanh','trang_thai'];

    public function ChiNhanh() {
        return $this->belongsTo('App\ChiNhanh', 'id_chi_nhanh', 'id');
    }

    public function Ghe() {
        return $this->belongsToMany('App\Ghe','d_s_ghes', 'id_rap', 'id_ghe');
    }

    public function LichChieu(){
        return $this->hasMany('App\LichChieu','id_rap','id');
    }

    public function ghe() {
        return $this->belongsToMany('App\ghe', 'danh_sach_ghe', 'id_rap', 'id_ghe');
    }
}