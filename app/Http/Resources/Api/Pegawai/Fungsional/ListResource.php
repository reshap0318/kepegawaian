<?php

namespace App\Http\Resources\Api\Pegawai\Fungsional;

use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fungsional' => $this->fungsional->nama,
            'tmt' => $this->tmt
        ];
    }
}
