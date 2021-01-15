<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ve extends Model
{
    protected $table = 'ves';
    protected $fillable = ['id', 'id_lich_chieu', 'id_khach_hang', 'id_ghe', 'gia_ve', 'ngay_mua', 'trang_thai'];

    public function khach_hang()
    {
        return $this->belongsTo('App\khach_hang', 'id_khach_hang', 'id');
    }

    public function ghe()
    {
        return $this->belongsTo('App\ghe', 'id_ghe', 'id');
    }

    public function lich_chieu()
    {
        return $this->belongsTo('App\lich_chieu', 'id_lich_chieu', 'id');
    }
}