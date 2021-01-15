<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lich_chieu extends Model
{
    protected $table = 'lich_chieus';
    protected $fillable = ['id', 'id_rap', 'id_phim', 'id_suat_chieu', 'gia_lich_chieu', 'trang_thai'];

    public function ve()
    {
        return $this->hasMany('App\ve', 'id_lich_chieu', 'id');
    }

    public function rap()
    {
        return $this->belongsTo('App\rap', 'id_rap', 'id');
    }

    public function phim()
    {
        return $this->belongsTo('App\phim', 'id_phim', 'id');
    }

    public function suat_chieu()
    {
        return $this->belongsTo('App\suat_chieu', 'id_suat_chieu', 'id');
    }

    public function ghe_dat()
    {
        return $this->hasMany('App\lich_chieu', 'id_lich_chieu', 'id');
    }
}