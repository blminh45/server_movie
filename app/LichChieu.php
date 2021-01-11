<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    protected $table='lich_chieus';
    protected $fillable = ['id','id_rap','id_phim','id_suat_chieu',];
 
    public function Ve()
    {
        return $this->hasMany('App\Ve','id_lich_chieu','id');
    }
    
    public function Rap()
    {
        return $this->belongsTo('App\Rap','id_rap','id');
    }

    public function Phim()
    {
        return $this->belongsTo('App\Phim','id_phim','id');
    }
    
    public function SuatChieu()
    {
        return $this->belongsTo('App\SuatChieu','id_suat_chieu','id');
    }

    public function GheDat()
    {
        return $this->hasMany('App\LichChieu','id_lich_chieu','id');
    }
}
