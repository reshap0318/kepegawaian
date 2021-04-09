<?php

namespace App\Http\Resources\Api\Pegawai\Pangkat;

use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pangkat' => $this->pangkatGolongan->nama,
            'tmt' => $this->tmt
        ];
    }
}
