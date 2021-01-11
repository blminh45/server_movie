<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    protected $table="ghes";
    protected $fillable = ['id','hang','cot','trang_thai'];

    public function Rap() {
        return $this->belongsToMany('App\Rap','danh_sach_ghes', 'id_ghe', 'id_rap');
    }

    public function Ve(){
        return $this->hasMany('App\Ve','id_ghe','id');
    }
}
