<?php

namespace App\Http\Resources\Api\Master;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'parent_id' => $this->parent ? $this->parent->nama : null
        ];
    }
}
