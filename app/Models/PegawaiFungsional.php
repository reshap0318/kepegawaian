<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiFungsional extends Model
{
    use HasFactory;

    protected $table = 'pegawai_fungsional';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pegawai_id', 'fungsional_id', 'tmt', 'file_sk', 'status', 'created_by', 'updated_by'
    ]; 

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }

    public function fungsional()
    {
        return $this->hasOne(Fungsional::class, 'id', 'fungsional_id');
    }
}
