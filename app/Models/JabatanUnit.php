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
        'unit_id', 'nama', 'grade', 'corporate_grade', 'parent_jabatan_unit_id'
    ];

    public function unit()
    {
        return $this->hasOne(Unit::class,'id','unit_id')->withDefault([
            'nama' => '',
        ]);
    }

    public function parent()
    {
        return $this->hasOne(JabatanUnit::class,'id','parent_jabatan_unit_id')->withDefault([
            'nama' => '' 
        ]);
    }

    public function childrens()
    {
        return $this->hasMany(JabatanUnit::class, 'parent_jabatan_unit_id', 'id');
    }
}
