<?php

namespace App\Http\Livewire\Frontend\User;

use App\Models\{User,Unit, Pegawai};
use Livewire\{Component, WithFileUploads};
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    use WithFileUploads;

    public $isPegawai = true;
    public $user;

    public $email, $username, $password, $confirm_password;
    public $nama, $gelar_depan, $gelar_belakang, $unit, $avatar, $alamat, $geo_alamat, $nip, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $nidn, $npwp, $tipe, $ikatan_kerja, $no_hp, $status, $tanggal_pensiun, $file_sk_cpns, $file_sk_pns;

    public function mount()
    {
        $user = Auth::user();

        $this->user = $user;
        $this->isPegawai = $user->pegawai ? true : false;
        $this->email = $user->email; 
        $this->username = $user->username; 
        if($this->isPegawai){
            $pegawai = $user->pegawai;
            $this->nama = $pegawai->nama;
            $this->avatar = $pegawai->avatar_url;
            $this->gelar_depan = $pegawai->gelar_depan;
            $this->gelar_belakang = $pegawai->gelar_belakang;
            $this->unit = $pegawai->unit_id;
            $this->alamat = $pegawai->alamat;
            $this->geo_alamat = $pegawai->geo_alamat;
            $this->nip = $pegawai->nip;
            $this->jenis_kelamin = $pegawai->jenis_kelamin;
            $this->tempat_lahir = $pegawai->tempat_lahir;
            $this->tanggal_lahir = $pegawai->tgl_lahir;
            $this->nidn = $pegawai->nidn;
            $this->npwp = $pegawai->npwp;
            $this->tipe = $pegawai->tipe;
            $this->ikatan_kerja = $pegawai->ikatan_kerja;
            $this->no_hp = $pegawai->no_hp;
            $this->status = $pegawai->status;
            $this->tanggal_pensiun = $pegawai->tgl_pensiun;
        }      
    }

    public function render()
    {
        return view('livewire.frontend.user.edit',[
            'units' => Unit::all(),
            'tipes' => Pegawai::TIPE_PEGAWAI
        ]);
    }
    
    public function update()
    {
        $this->myValidation();

        $user = $this->updateUser();
        if($this->isPegawai){
            $this->updatePegawai($user);
        }
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('frontend.pegawai.index');

    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'nullable|image',
        ]);
        // $this->avatar = $this->avatar->temporaryUrl();
    }

    public function updateUser()
    {
        $user = $this->user->update([
            'email' => $this->email,
            'username' => $this->username,
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
        $pegawai->nama = $this->nama;
        $pegawai->gelar_depan = $this->gelar_depan;
        $pegawai->gelar_belakang = $this->gelar_belakang;
        $pegawai->unit_id = $this->unit;
        $pegawai->alamat = $this->alamat;
        $pegawai->geo_alamat = $this->geo_alamat;
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
        
        if($this->avatar && $this->avatar != $pegawai->avatar_url){
            $fileName = "avatar_".$pegawai->nip.".".$this->avatar->extension();
            $pegawai->avatar = $this->avatar->storeAs('avatars', $fileName,'public');
        }

        if($this->file_sk_cpns){
            $fileName = "surat_keputusan_calon_pegawai_negeri_sipil_".$pegawai->nip.".".$this->file_sk_cpns->extension();
            $pegawai->file_sk_cpns = $this->file_sk_cpns->storeAs('sk_cpns', $fileName,'public');
        }

        if($this->file_sk_pns){
            $fileName = "surat_keputusan_pegawai_negeri_sipil_".$pegawai->nip.".".$this->file_sk_pns->extension();
            $pegawai->file_sk_pns = $this->file_sk_pns->storeAs('sk_pns', $fileName,'public');
        }
        $pegawai->update();
        return $this->user->pegawai;
    }

    public function myValidation()
    {
        $this->validate([
            'email'             => 'required|email|unique:users,email,'.$this->user->id,
            'username'          => 'required|unique:users,username,'.$this->user->id,
            'nama'              => 'required',
            'unit'              => 'required', 
            'jenis_kelamin'     => 'required', 
            'tempat_lahir'      => 'required', 
            'tanggal_lahir'     => 'required',
            'file_sk_cpns'      => 'nullable|file|mimes:pdf',
            'file_sk_pns'       => 'nullable|file|mimes:pdf',
        ]);
    }
}
