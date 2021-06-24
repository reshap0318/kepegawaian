<?php

namespace App\Http\Resources\Api\Master;

use Illuminate\Http\Resources\Json\JsonResource;

class JabatanUnitResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'unit' => $this->unit->nama,
            'nama' => $this->nama,
            'grade' => $this->grade,
            'corporate_grade' => $this->corporate_grade,
            'parent' => [
                'id' => $this->parent->id,
                'nama' => $this->parent->nama,
                'unit' => $this->parent ? $this->parent->unit->nama : ""
            ],
        ];
    }
}
