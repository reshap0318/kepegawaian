<?php

namespace App\Http\Livewire\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\{JabatanUnit, PegawaiJabatan,User};

class Edit extends Component
{
    public $pegawaiJabatan;
    public $pegawai_id, $jabatan, $tgl_mulai, $tgl_selesai, $file_sk, $status, $created_by, $updated_by;
    

    public function render()
    {
        return view('backend.pegawai.jabatan.edit',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }
    public function mount(PegawaiJabatan $pegawaiJabatan)
    {
        $this->pegawaiJabatan = $pegawaiJabatan;
        $this->pegawai_id = $pegawaiJabatan->pegawai_id;
        $this->jabatan = $pegawaiJabatan->jabatan;
        $this->tgl_mulai = $pegawaiJabatan->tgl_mulai;
        $this->tgl_selesai = $pegawaiJabatan->tgl_selesai;
        $this->status = $pegawaiJabatan->status;
        $this->file_sk = $pegawaiJabatan->file_sk;
        $this->created_by = $pegawaiJabatan->created_by;
        $this->updated_by = $pegawaiJabatan->updated_by;

    }

    public function update()
    {
        $this->validate([
            'jabatan' => 'required',

        ]);
        $this->pegawaiJabatan->update([
            'pegawai_id' => Auth()->user()->id,
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,
            'status' => 0,
            'file_sk' => $this->file_sk,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);
        return redirect()->route('pegawaiJabatans.index');
    }

}
