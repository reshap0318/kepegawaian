<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'gelar_depan', 'gelar_belakang', 'unit_id', 'alamat', 'geo_alamat', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'nidn', 'npwp', 'tipe', 'ikatan_kerja', 'no_hp', 'status', 'tanggal_pensiun', 'file_sk_cpns', 'file_sk_pns'
    ]; 

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }
}
