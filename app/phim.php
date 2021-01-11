<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phim extends Model
{
    protected $table='phims';
    protected $primaryKey='id';
    protected $fillable = ['id', 'ten_phim', 'id_the_loai', 'hinh_anh', 'thoi_luong', 'trang_thai'];

    public function the_loai()
    {
        return $this->belongsTo('App\the_loai', 'id_the_loai', 'id');
    }

    public function LichChieu(){
        return $this->hasMany('App\LichChieu','id_phim','id');
    }
}
