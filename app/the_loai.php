<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class the_loai extends Model
{
    protected $table='the_loais';
    protected $fillable = ['id','ten_the_loai','trang_thai'];

    public function phim()
    {
        return $this->hasMany('App\phim', 'id_the_loai');
    }
}
