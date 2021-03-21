<?php

namespace App\Http\Livewire\Backend\Pegawai;

use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $isPegawai = true;
    public $email, $username, $password, $confirm_password;
    public $nama, $gelar_depan, $gelar_belakang, $unit, $alamat, $geo_alamat, $nip, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $nidn, $npwp, $tipe, $ikatan_kerja, $no_hp, $status, $tanggal_pensiun, $file_sk_cpns, $file_sk_pns;

    public function render()
    {
        return view('livewire.backend.pegawai.create',[
            'units' => Unit::all()
        ]);
    }

    public function store()
    {
        $this->myValidation();

        $user = $this->storeUser();
        if($this->isPegawai){
            $pegawai = $this->storePegawai($user);
        }
        return redirect()->route('pegawai.index');

    }

    public function storeUser()
    {
        $user = User::create([
            'email' => $this->email,
            'username' => $this->username,
            'password' => bcrypt($this->password)
        ]);

        return $user;
    }

    public function storePegawai(User $user)
    {
        $pegawai = new Pegawai();
        $pegawai->id = $user->id;
        $pegawai->nama = $this->nama;
        $pegawai->gelar_depan = $this->gelar_depan;
        $pegawai->gelar_belakang = $this->gelar_belakang;
        $pegawai->unit_id = $this->unit;
        $pegawai->alamat = $this->alamat;
        $pegawai->geo_alamat = $this->geo_alamat;
        $pegawai->nip = $this->nip;
        $pegawai->jenis_kelamin = $this->jenis_kelamin;
        $pegawai->tempat_lahir = $this->tempat_lahir;
        $pegawai->tgl_lahir = $this->tanggal_lahir;
        $pegawai->nidn = $this->nidn;
        $pegawai->npwp = $this->npwp;
        $pegawai->tipe = $this->tipe;
        $pegawai->ikatan_kerja = $this->ikatan_kerja;
        $pegawai->no_hp = $this->no_hp;
        $pegawai->status = $this->status;
        $pegawai->tgl_pensiun = $this->tanggal_pensiun;
        $pegawai->file_sk_cpns = $this->file_sk_cpns;
        $pegawai->file_sk_pns = $this->file_sk_pns;
        $pegawai->save();
        return $pegawai;
    }

    public function myValidation()
    {
        $this->validate([
            'email'             => 'required|unique:users,email|email',
            'username'          => 'required|unique:users,username',
            'nama'              => 'required',
            'password'          => 'required|string|min:8',
            'confirm_password'  => 'required|string|min:8|same:password',
        ]);

        if($this->isPegawai){
            $this->validate([
                'unit'              => 'required', 
                'nip'               => 'required', 
                'jenis_kelamin'     => 'required', 
                'tempat_lahir'      => 'required', 
                'tanggal_lahir'     => 'required', 
            ]);
        }
    }
}
