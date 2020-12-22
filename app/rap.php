<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rap extends Model
{
    protected $table='raps';
    protected $fillable = ['id','so_luong_ghe','id_chi_nhanh','trang_thai'];

    public function chi_nhanh() {
        return $this->belongsTo('App\chi_nhanh', 'id_chi_nhanh', 'id');
    }

    public function ghe() {
        return $this->belongsToMany('App\ghe', 'danh_sach_ghe', 'id_rap', 'id_ghe');
    }
}