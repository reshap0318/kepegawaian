<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsional extends Model
{
    use HasFactory;

    protected $table = 'fungsional';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'grade'
    ];
}
