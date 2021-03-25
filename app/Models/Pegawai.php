<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nama' ,'gelar_depan', 'gelar_belakang', 'unit_id', 'alamat', 'geo_alamat', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'nidn', 'npwp', 'tipe', 'ikatan_kerja', 'no_hp', 'status', 'tgl_pensiun', 'file_sk_cpns', 'file_sk_pns'
    ]; 

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($model) {
            if($model->file_sk_cpns){
                Storage::disk('public')->delete($model->file_sk_cpns);
            }
            if($model->file_sk_pns){
                Storage::disk('public')->delete($model->file_sk_pns);
            }
        });
    }

    public const DOSEN = 1;
    public const TENDIK = 2;

    public const TIPE_PEGAWAI = [
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

    public function getTipePegawaiTextAttribute($value)
    {
        if(array_key_exists($this->tipe, self::TIPE_PEGAWAI))
        {
            return self::TIPE_PEGAWAI[$this->tipe];
        }
        return '';
    }

    public function getNamaLengkapAttribute($value)
    {
        return $this->gelar_depan." ".$this->nama." ".$this->gelar_belakang;
    }

    public function getJenisKelaminTextAttribute($value)
    {
        return $this->jenis_kelamin ? "Laki - Laki" : "Perempuan";
    }

    public function getFileSkCpnsUrlAttribute($value)
    {
        $patlink = rtrim(app()->basePath('public/storage'), '/');
        if($this->file_sk_cpns && is_dir($patlink) && Storage::disk('public')->exists($this->file_sk_cpns)){
            return url("/storage/".$this->file_sk_cpns);
        }
        return "";
    }

    public function getFileSkPnsUrlAttribute($value)
    {
        $patlink = rtrim(app()->basePath('public/storage'), '/');
        if($this->file_sk_pns && is_dir($patlink) && Storage::disk('public')->exists($this->file_sk_pns)){
            return url("/storage/".$this->file_sk_pns);
        }
        return "";
    }

    public function isDosen()
    {
        return $this->tipe_pegawai == self::DOSEN;
    }

    public function isTendik()
    {
        return $this->tipe_pegawai == self::TENDIK;
    }
}
