<?php

namespace App\Http\Livewire\Backend\Pegawai;

use Spatie\Permission\Models\Role;
use App\Models\{Unit,Pegawai, User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Livewire\{Component, WithFileUploads};

class Create extends Component
{
    use WithFileUploads;

    public $isPegawai = true;
    public $email, $username, $password, $confirm_password, $role;
    public $nama, $avatar, $gelar_depan, $gelar_belakang, $unit, $alamat, $geo_alamat, $nip, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $nidn, $npwp, $tipe, $ikatan_kerja, $no_hp, $status, $tanggal_pensiun, $file_sk_cpns, $file_sk_pns;

    public function render()
    {
        return view('livewire.backend.pegawai.create',[
            'units' => Unit::all(),
            'tipes' => Pegawai::TIPE_PEGAWAI,
            'roles' => Auth::user()->hasRole('admin') ? Role::all() : Role::whereNotIn('id',[1])->get()
        ]);
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'nullable|image',
        ]);
        $this->avatar = $this->avatar->temporaryUrl();
    }

    public function store()
    {
        $data = $this->myValidation();
        
        $user = $this->storeUser();
        $user->assignRole($this->role);

        if($this->isPegawai){
            $this->storePegawai($user);
        }
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('pegawai.index');

    }

    public function storeUser()
    {
        $user = User::create([
            'email' => $this->email,
            'username' => $this->username ?? $this->nip,
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
        $pegawai->nip = $this->nip;
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

        if($this->avatar){
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
        $pegawai->save();

        event(new Registered($user));
        return $pegawai;
    }

    public function myValidation()
    {
        return $this->validate([
            'email'             => 'required|unique:users,email|email',
            'username'          => 'nullable|unique:users,username',
            'password'          => 'required|string|min:8',
            'confirm_password'  => 'required|string|min:8|same:password',
            'role'              => 'required',
            'nama'              => 'required',
            'unit'              => 'required', 
            'nip'               => 'required', 
            'jenis_kelamin'     => 'required', 
            'tempat_lahir'      => 'required', 
            'tanggal_lahir'     => 'required',
            'file_sk_cpns'      => 'nullable|file|mimes:pdf',
            'file_sk_pns'       => 'nullable|file|mimes:pdf',
            'avatar'            => 'nullable|image',
        ]);
    }
}
