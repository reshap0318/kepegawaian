<?php

namespace App\Http\Resources\Api\Master;

use Illuminate\Http\Resources\Json\JsonResource;

class FungsionalResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'unit_id' => $this->unit_id,
            'nama' => $this->nama,
            'grade' => $this->grade,
            'corporate_grade' => $this->corporate_grade
        ];
    }
}
