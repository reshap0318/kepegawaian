<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PegawaiPangkat extends Model
{
    use HasFactory;
    protected $table = 'pegawai_pangkat';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pegawai_id', 'pangkat_id', 'tmt', 'file_sk', 'status', 'created_by', 'updated_by'
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
    
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }

    public function pangkatGolongan()
    {
        return $this->belongsTo(PangkatGolongan::class, 'pangkat_id', 'id');
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
