<?php

namespace App\Http\Resources\Api\Pegawai\Mutasi;

use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
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
            'unit' => $this->unit->nama,
            'tmt' => $this->tgl_mutasi
        ];
    }
}
