<?php

namespace App\Http\Resources\Api\Pegawai;

use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'avatar' => $this->avatar_url,
            'nama_lengkap' => $this->nama_lengkap,
            'nip' => $this->nip,
            'unit' => $this->unit->nama
        ];
    }
}
