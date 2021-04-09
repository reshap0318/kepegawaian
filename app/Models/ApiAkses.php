<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiAkses extends Model
{
    use HasFactory;

    protected $table = 'api_akses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'app_key'
    ];
}
