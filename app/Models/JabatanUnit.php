<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanUnit extends Model
{
    use HasFactory;

    protected $table = 'jabatan_unit';
    protected $primaryKey = 'id';

    protected $fillable = [
        'unit_id', 'nama', 'grade', 'corporate_grade'
    ];

    public function unit()
    {
        return $this->hasOne(Unit::class,'id','unit_id');
    }
}
