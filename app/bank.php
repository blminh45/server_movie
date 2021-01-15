<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    protected $table = 'banks';
    protected $fillable = ['STK', 'ten_chu_the', 'mat_khau', 'so_du'];
}
