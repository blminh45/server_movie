<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_nhanh extends Model
{
    protected $table='chi_nhanhs';
    protected $fillable = ['id','ten_chi_nhanh','dia_chi','trang_thai'];

    public function rap() {
        $this->hasMany('App\rap', 'id_chi_nhanh', 'id');
    }
}
