<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PegawaiJabatan extends Model
{
    use HasFactory;

    protected $table = 'pegawai_jabatan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pegawai_id', 'jabatan_id', 'tgl_mulai', 'tgl_selesai','file_sk', 'status', 'created_by', 'updated_by'
    ]; 

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($model) {
            if($model->file_sk){
                Storage::disk('public')->delete($model->file_sk);
            }
        });
    }
    
    public function getFileSkUrlAttribute($value)
    {
        $patlink = rtrim(app()->basePath('public/storage'), '/');
        if($this->file_sk && is_dir($patlink) && Storage::disk('public')->exists($this->file_sk)){
            return url("/storage/".$this->file_sk);
        }
        return "";
    }
    
    public function jabatan()
    {
        return $this->hasOne(JabatanUnit::class, 'id', 'jabatan_id');
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }

    public function createdBy()
    {
        return $this->hasOne(Pegawai::class, 'id', 'created_by');
    }

    public function updatedBy()
    {
        return $this->hasOne(Pegawai::class, 'id', 'updated_by');
    }
}
