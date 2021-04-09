<?php

namespace App\Http\Livewire\Backend\Pegawai;

use Spatie\Permission\Models\Role;
use App\Models\{User,Unit, Pegawai};
use Illuminate\Support\Facades\Auth;
use Livewire\{Component, WithFileUploads};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests; 
    use WithFileUploads;

    public $isPegawai = true;
    public $user;

    public $email, $username, $password, $confirm_password, $role;
    public $nama, $avatar, $gelar_depan, $gelar_belakang, $unit, $alamat, $geo_alamat, $nip, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $nidn, $npwp, $tipe, $ikatan_kerja, $no_hp, $status, $tanggal_pensiun, $file_sk_cpns, $file_sk_pns;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        
        $this->user = $user;
        $this->isPegawai = $user->pegawai ? true : false;
        $this->email = $user->email; 
        $this->username = $user->username; 
        $this->role = $user->roles()->first()->id;
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

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'nullable|image',
        ]);
        // $this->avatar = $this->avatar->temporaryUrl();
    }

    public function render()
    {
        return view('livewire.backend.pegawai.edit',[
            'units' => Unit::all(),
            'tipes' => Pegawai::TIPE_PEGAWAI,
            'roles' => Auth::user()->hasRole('admin') ? Role::all() : Role::whereNotIn('id',[1])->get()
        ]);
    }

    public function update()
    {
        $this->myValidation();

        $user = $this->updateUser();
        $user->assignRole($this->role);
        if($this->password){
            $this->updatePassword();
        }
        if($this->isPegawai){
            $this->updatePegawai($user);
        }
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('pegawai.index');

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
        $pegawai->nip = $this->nip;
        $pegawai->unit_id = $this->unit;
        $pegawai->alamat = $this->alamat;
        $pegawai->jenis_kelamin = $this->jenis_kelamin;
        $pegawai->tempat_lahir = $this->tempat_lahir;
        $pegawai->tgl_lahir = $this->tanggal_lahir;
        $pegawai->nidn = $this->nidn;
        $pegawai->npwp = $this->npwp;
        $pegawai->tipe = $this->tipe;
        $pegawai->ikatan_kerja = $this->ikatan_kerja ? true : false;
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
        return $this->validate([
            'email'             => 'required|email|unique:users,email,'.$this->user->id,
            'username'          => 'required|unique:users,username,'.$this->user->id,
            'password'          => 'nullable|string|min:8',
            'confirm_password'  => $this->password ? 'string|min:8|same:password' : '',
            'role'              => 'required',
            'nama'              => 'required',
            'unit'              => 'required', 
            'nip'               => 'required', 
            'jenis_kelamin'     => 'required', 
            'tempat_lahir'      => 'required', 
            'tanggal_lahir'     => 'required',
            'file_sk_cpns'      => 'nullable|file|mimes:pdf',
            'file_sk_pns'       => 'nullable|file|mimes:pdf',
        ]);
    }
}
