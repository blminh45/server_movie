<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ghe extends Model
{
    protected $table="ghes";
    protected $fillable = ['id','hang','cot','trang_thai'];

    public function ghe() {
        return $this->belongsToMany('App\rap','danh_sach_ghes', 'id_ghe', 'id_rap');
    }

    public function ve(){
        return $this->hasMany('App\ve','id_ghe','id');
    }
}
