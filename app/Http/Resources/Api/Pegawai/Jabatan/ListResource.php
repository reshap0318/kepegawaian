<?php

namespace App\Http\Resources\Api\Pegawai\Jabatan;

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
            'jabatan' => $this->jabatan->nama,
            'unit' => $this->jabatan->unit->nama,
            'tanggal_mulai' => $this->tgl_mulai,
            'tanggal_selesai' => $this->tgl_selesai
        ];
    }
}
