<?php

namespace App\Http\Resources\Api\Pegawai\Jabatan;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'jabatan' => $this->jabatan->nama,
            'unit' => $this->jabatan->unit->nama,
            'tanggal_mulai' => $this->tgl_mulai,
            'tanggal_selesai' => $this->tgl_selesai,
            'status' => $this->status,
            'file_sk' => $this->file_sk_url,
            'created_by' => $this->createdBy->nama,
            'updated_by' => $this->updatedBy->nama
        ];
    }
}
