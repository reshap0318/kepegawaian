<?php

namespace App\Http\Livewire\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\{JabatanUnit, PegawaiJabatan, User};

class Edit extends Component
{
    public $pegawaiJabatan, $user;
    public $jabatan, $tanggal_mulai, $tanggal_selesai, $file_sk;
    

    public function render()
    {
        return view('backend.pegawai.jabatan.edit',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }
    public function mount(User $user, PegawaiJabatan $pegawaiJabatan)
    {
        $this->pegawaiJabatan = $pegawaiJabatan;
        $this->jabatan = $pegawaiJabatan->jabatan_id;
        $this->tanggal_mulai = $pegawaiJabatan->tgl_mulai;
        $this->tanggal_selesai = $pegawaiJabatan->tgl_selesai;
        $this->file_sk = $pegawaiJabatan->file_sk;

        $this->user = $user;
    }

    public function update()
    {
        $this->validate([
            'jabatan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $this->pegawaiJabatan->update([
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tanggal_mulai,
            'tgl_selesai' => $this->tanggal_selesai,
            'status' => 1,
            'file_sk' => $this->file_sk,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawaiJabatans.index', $this->user);
    }

}
