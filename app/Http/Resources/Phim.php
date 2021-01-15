<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Phim extends JsonResource
{
    public $preserveKeys = true;
    public static $wrap = 'phim';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ten_phim' => $this->ten_phim,
            'id_the_loai' => $this->id_the_loai,
            'thoi_luong' => $this->thoi_luong
        ];
    }
}
