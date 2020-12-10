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
            'thoi_luong' => $this->thoi_luong
        ];
    }
}
