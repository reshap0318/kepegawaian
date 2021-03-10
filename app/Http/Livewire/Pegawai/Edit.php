<?php

namespace App\Http\Livewire\Pegawai;

use App\Models\{User,Unit,Pegawai};
use Livewire\Component;

class Edit extends Component
{
    public $isPegawai = true;
    public $user;
    public $email, $username, $nama, $password, $confirm_password;
    public $gelar_depan, $gelar_belakang, $unit, $alamat, $geo_alamat, $nip, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $nidn, $npwp, $tipe, $ikatan_kerja, $no_hp, $status, $tanggal_pensiun, $file_sk_cpns, $file_sk_pns;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isPegawai = $user->pegawai ? true : false;
        $this->email = $user->email; 
        $this->username = $user->username; 
        $this->nama = $user->name;
        if($this->isPegawai){
            $pegawai = $user->pegawai;
            $this->gelar_depan = $pegawai->gelar_depan;
            $this->gelar_belakang = $pegawai->gelar_belakang;
            $this->unit = $pegawai->unit_id;
            $this->alamat = $pegawai->alamat;
            $this->geo_alamat = $pegawai->geo_alamat;
            $this->nip = $pegawai->nip;
            $this->jenis_kelamin = $pegawai->jenis_kelamin;
            $this->tempat_lahir = $pegawai->tempat_lahir;
            $this->tanggal_lahir = $pegawai->tanggal_lahir;
            $this->nidn = $pegawai->nidn;
            $this->npwp = $pegawai->npwp;
            $this->tipe = $pegawai->tipe;
            $this->ikatan_kerja = $pegawai->ikatan_kerja;
            $this->no_hp = $pegawai->no_hp;
            $this->status = $pegawai->status;
            $this->tanggal_pensiun = $pegawai->tanggal_pensiun;
            $this->file_sk_cpns = $pegawai->file_sk_cpns;
            $this->file_sk_pns = $pegawai->file_sk_pns;
        }
    }

    public function render()
    {
        return view('backend.pegawai.edit',[
            'units' => Unit::all()
        ]);
    }

    public function update()
    {
        $this->myValidation();

        $user = $this->updateUser();
        if($this->password){
            $this->updatePassword();
        }
        if($this->isPegawai){
            $pegawai = $this->updatePegawai($user);
        }
        return redirect()->route('pegawai.index');

    }

    public function updateUser()
    {
        $user = $this->user->update([
            'email' => $this->email,
            'username' => $this->username,
            'name' => $this->nama,
        ]);

        return $this->user;
    }

    public function updatePassword()
    {
        $user = $this->user->update([
            'password' => bcrypt($this->password)
        ]);
        return $this->user;
    }

    public function updatePegawai(User $user)
    {
        $pegawai = $user->pegawai;
        $pegawai->gelar_depan = $this->gelar_depan;
        $pegawai->gelar_belakang = $this->gelar_belakang;
        $pegawai->unit_id = $this->unit;
        $pegawai->alamat = $this->alamat;
        $pegawai->geo_alamat = $this->geo_alamat;
        $pegawai->nip = $this->nip;
        $pegawai->jenis_kelamin = $this->jenis_kelamin;
        $pegawai->tempat_lahir = $this->tempat_lahir;
        $pegawai->tanggal_lahir = $this->tanggal_lahir;
        $pegawai->nidn = $this->nidn;
        $pegawai->npwp = $this->npwp;
        $pegawai->tipe = $this->tipe;
        $pegawai->ikatan_kerja = $this->ikatan_kerja;
        $pegawai->no_hp = $this->no_hp;
        $pegawai->status = $this->status;
        $pegawai->tanggal_pensiun = $this->tanggal_pensiun;
        $pegawai->file_sk_cpns = $this->file_sk_cpns;
        $pegawai->file_sk_pns = $this->file_sk_pns;
        $pegawai->update();
        return $pegawai;
    }

    public function myValidation()
    {
        $this->validate([
            'email'             => 'required|unique:users,email,'.$this->user->id,
            'username'          => 'required|unique:users,username,'.$this->user->id,
            'nama'              => 'required',
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

        if($this->password){
            $this->validate([
                'password'          => 'required|string|min:8',
                'confirm_password'  => 'required|string|min:8|same:password',
            ]);
        }
    }
}
