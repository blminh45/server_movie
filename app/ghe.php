<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ghe extends Model
{
    protected $table = 'ghes';
    protected $fillable = ['id','hang','cot','trang_thai'];

    public function rap() {
        return $this->belongsToMany('App\rap', 'danh_sach_ghe', 'id_ghe', 'id_rap');
    }
}
