<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'unit';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'parent_unit_id'
    ];

    public function parent()
    {
        return $this->hasOne(Unit::class,'id','parent_unit_id');
    }

    public function childrens()
    {
        return $this->hasMany(Unit::class, 'parent_unit_id', 'id');
    }
}
