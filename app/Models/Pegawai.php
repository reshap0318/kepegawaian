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
        'id', 'gelar_depan', 'gelar_belakang', 'unit_id', 'alamat', 'geo_alamat', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'nidn', 'npwp', 'tipe', 'ikatan_kerja', 'no_hp', 'status', 'tgl_pensiun', 'file_sk_cpns', 'file_sk_pns'
    ]; 

    public const DOSEN = 1;
    public const TENDIK = 2;

    public const JENIS_PEGAWAI = [
        self::DOSEN => 'Dosen',
        self::TENDIK => 'Tendik'
    ];

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }

    public function getJenisPegawaiTextAttribute($value)
    {
        if(in_array($this->jenis_pegawai, self::JENIS_PEGAWAI))
        {
            return self::JENIS_PEGAWAI[$this->jenis_pegawai];
        }
        return '';
    }

    public function isDosen()
    {
        return $this->jenis_pegawai == self::DOSEN;
    }

    public function isTendik()
    {
        return $this->jenis_pegawai == self::TENDIK;
    }
}
