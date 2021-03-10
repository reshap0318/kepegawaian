<?php

namespace App\Http\Livewire\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\{PegawaiJabatan, JabatanUnit, User};

class Create extends Component
{
    public $jabatan, $tanggal_mulai, $tanggal_selesai, $file_sk;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('backend.pegawai.jabatan.create',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }
    public function store()
    {
        $this->validate([
            'jabatan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        PegawaiJabatan::create([
            'pegawai_id' => $this->user->id,
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tanggal_mulai,
            'tgl_selesai' => $this->tanggal_selesai,
            'status' => 1,
            'file_sk' => $this->file_sk,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawaiJabatans.index',$this->user);
    }
}
