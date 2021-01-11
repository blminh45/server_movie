<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ghe extends Model
{
    protected $table="ghes";
    protected $fillable = ['id','hang','cot','trang_thai'];

    public function Rap() {
        return $this->belongsToMany('App\rap','danh_sach_ghe', 'id_ghe', 'id_rap');
    }

    public function Ve(){
        return $this->hasMany('App\ve','id_ghe','id');
    }
}
