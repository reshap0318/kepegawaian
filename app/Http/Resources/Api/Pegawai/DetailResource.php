<?php

namespace App\Http\Resources\Api\Pegawai;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'avatar' => $this->avatar_url,
            'email' => $this->user->email,
            'username' => $this->user->username,
            'nama' => $this->nama ,
            'gelar_depan' => $this->gelar_depan ,
            'gelar_belakang' => $this->gelar_belakang,
            'nip' => $this->nip ,          
            'unit' => $this->unit->nama,
            'jenis_kelamin' => $this->jenis_kelamin_text,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'nidn' => $this->nidn,
            'npwp' => $this->npwp,
            'tipe' => $this->tipe_pegawai_text,
            'ikatan_kerja' => $this->ikatan_kerja,
            'no_hp' => $this->no_hp,
            'status' => $this->status,
            'tgl_pensiun' => $this->tgl_pensiun,
            'sk_cpns' => $this->file_sk_cpns_url,
            'sk_pns' => $this->file_sk_pns_url,
            'jabatan' => $this->lastJabatan()->first() ? $this->lastJabatan()->first()->jabatan->nama : null
        ];
    }
}
