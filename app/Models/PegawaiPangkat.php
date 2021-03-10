<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPangkat extends Model
{
    use HasFactory;
    protected $table = 'pegawai_pangkat';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pegawai_id', 'pangkat_id', 'tmt', 'file_sk', 'status', 'created_by', 'updated_by'
    ];
    public function Pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'pegawai_id', 'id');
    }
    public function PangkatGolongan()
    {
        return $this->belongsTo('App\PangkatGolongan', 'pangkat_id', 'id');
    }
}
