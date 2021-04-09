<?php

namespace App\Http\Resources\Api\Master;

use Illuminate\Http\Resources\Json\JsonResource;

class JabatanUnitResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'grade' => $this->grade
        ];
    }
}
