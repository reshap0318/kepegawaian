<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Storage,DB};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nama', 'avatar' ,'gelar_depan', 'gelar_belakang', 'unit_id', 'alamat', 'geo_alamat', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'nidn', 'npwp', 'tipe', 'ikatan_kerja', 'no_hp', 'status', 'tgl_pensiun', 'file_sk_cpns', 'file_sk_pns'
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

    public const TETAPNS = 1;
    public const NONTETAPNS = 2;
    public const DOSENLUARBIASA = 3;

    public const IKATAN_PEGAWAI = [
        self::TETAPNS => 'Pegawai Tetap PNS',
        self::NONTETAPNS => 'Pegawai Tetap Non PNS',
        self::DOSENLUARBIASA => 'Dosen Luar Biasa'
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

    public function getTipeIkatanTextAttribute($value)
    {
        if(array_key_exists($this->ikatan_kerja, self::IKATAN_PEGAWAI))
        {
            return self::IKATAN_PEGAWAI[$this->ikatan_kerja];
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

    public function getAvatarUrlAttribute()
    {
        $patlink = rtrim(app()->basePath('public/storage'), '/');
        if($this->avatar && is_dir($patlink) && Storage::disk('public')->exists($this->avatar)){
            return url("/storage/".$this->avatar);
        }
        return asset('image/avatar-default.png');
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

    public function isTetapns()
    {
        return $this->tipe_ikatan == self::TETAPNS;
    }

    public function isNontetapns()
    {
        return $this->tipe_ikatan == self::NONTETAPNS;
    }

    public function isDosenluarbiasa()
    {
        return $this->tipe_ikatan == self::DOSENLUARBIASA;
    }

    public function jabatans()
    {
        return $this->hasMany(PegawaiJabatan::class, 'pegawai_id', 'id');
    }

    public function scopeLastJabatan($query)
    {
        $waktu = date("Y-m-d");
        return $this->jabatans()->whereRaw("'$waktu' BETWEEN tgl_mulai and tgl_selesai");
    }

    public function mutasis()
    {
        return $this->hasMany(Mutasi::class, 'pegawai_id', 'id');
    }

    public function pangkats()
    {
        return $this->hasMany(PegawaiPangkat::class, 'pegawai_id', 'id');
    }

    public function fungsionals()
    {
        return $this->hasMany(PegawaiFungsional::class, 'pegawai_id', 'id');
    }

    public function myUnits()
    {
        $hasil = [];
        $unit_id = $this->unit_id;
        $connection = config('database.default');
        if($connection == 'mysql'){
            $units = DB::select(DB::RAW("select id
                from    (select * from unit order by parent_unit_id, id) unit,
                (select @pv := '$unit_id') initialisation
                where (find_in_set(parent_unit_id, @pv) > 0
                and @pv := concat(@pv, ',', id)) or id = $unit_id"
            ));
        }else{
            $units = [];
            $hasil = [1,2,3,4,5,6,7,8,9,10,11,12,13];
        }
        
        foreach ($units as $unit) {
            array_push($hasil, $unit->id);
        }

        return $hasil;
    }

    public function myParent()
    {
        $hasil = [1];
        $unit =  $this->user->pegawai->unit;
        do {
            array_push($hasil, $unit->id);
            $unit = $unit->parent;
        } while ($unit->parent->id);

        return $hasil;
    }
}
