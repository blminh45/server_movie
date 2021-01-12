<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table='khach_hangs';
    protected $fillable = ['id','ten','dia_chi','so_dien_thoai','email','gioi_tinh','anh_dai_dien','mat_khau','trang_thai'];
    public function Ve(){
        return $this->hasMany('App\Ve', 'id_khach_hang', 'id');
    }
}
