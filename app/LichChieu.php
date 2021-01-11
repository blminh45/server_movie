<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    protected $table='lich_chieus';
    protected $fillable = ['id','id_rap','id_phim','id_suat_chieu',];
 
    public function Ve()
    {
        return $this->hasMany('App\vve','id_lich_chieu','id');
    }
    
    public function Rap()
    {
        return $this->belongsTo('App\rrap','id_rap','id');
    }

    public function Phim()
    {
        return $this->belongsTo('App\phim','id_phim','id');
    }
    
    public function SuatChieu()
    {
        return $this->belongsTo('App\suat_chieu','id_suat_chieu','id');
    }

    public function GheDat()
    {
        return $this->hasMany('App\danh_sach_chon_ghe','id_lich_chieu','id');
    }
}
