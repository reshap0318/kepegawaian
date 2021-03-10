<?php

namespace App\Http\Livewire\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\JabatanUnit;
use App\Models\PegawaiJabatan;

class Create extends Component
{
    public $pegawai_id , $jabatan, $tgl_mulai, $tgl_selesai, $file_sk, $status, $created_by, $updated_by;

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


        ]);

        PegawaiJabatan::create([
            'pegawai_id' => Auth()->user()->id,
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,
            'status' => 0,
            'file_sk' => $this->file_sk,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawaiPangkats.index');
    }
}
