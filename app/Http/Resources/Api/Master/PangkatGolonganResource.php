<?php

namespace App\Http\Resources\Api\Master;

use Illuminate\Http\Resources\Json\JsonResource;

class PangkatGolonganResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'golongan' => $this->golongan
        ];
    }
}
