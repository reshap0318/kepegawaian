<?php

namespace App\Http\Resources\Api\Pegawai\Fungsional;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fungsional' => $this->fungsional->nama,
            'tmt' => $this->tmt,
            'status' => $this->status,
            'file_sk' => $this->file_sk_url,
            'created_by' => $this->createdBy->nama,
            'updated_by' => $this->updatedBy->nama
        ];
    }
}
