<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PangkatGolongan extends Model
{
    use HasFactory;

    protected $table = 'pangkat_golongan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'golongan'
    ];

    public function PegawaiPangkat()
    {
        return $this->hasMany(PegawaiPangkat::class);
    }
    public function Pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
