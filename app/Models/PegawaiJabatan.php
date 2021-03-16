<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiJabatan extends Model
{
    use HasFactory;

    protected $table = 'pegawai_jabatan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pegawai_id', 'jabatan_id', 'tgl_mulai', 'tgl_selesai','file_sk', 'status', 'created_by', 'updated_by'
    ]; 

    public function jabatan()
    {
        return $this->hasOne(JabatanUnit::class, 'id', 'jabatan_id');
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }
}
