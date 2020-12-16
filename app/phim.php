<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phim extends Model
{
    protected $fillable = ['id', 'ten_phim', 'id_the_loai', 'thoi_luong', 'trang_thai'];
}
