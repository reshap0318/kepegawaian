<?php

namespace App\Http\Livewire\Pegawai\Pangkat;

use App\Models\{PangkatGolongan, PegawaiPangkat,User};
use Livewire\Component;

class Edit extends Component
{
    public $pegawaiPangkat;
    public $pegawai_id, $pangkat, $tmt, $status, $file_sk, $created_by, $updated_by;
    
    public function render()
    {
        return view('backend.pegawai.pangkat.edit',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }

    public function mount(PegawaiPangkat $pegawaiPangkat)
    {
        $this->pegawaiPangkat = $pegawaiPangkat;
        $this->pegawai_id = $pegawaiPangkat->pegawai_id;
        $this->pangkat = $pegawaiPangkat->pangkat;
        $this->tmt = $pegawaiPangkat->tmt;
        $this->status = $pegawaiPangkat->status;
        $this->file_sk = $pegawaiPangkat->file_sk;
        $this->created_by = $pegawaiPangkat->created_by;
        $this->updated_by = $pegawaiPangkat->updated_by;

    }

    public function update()
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required',

            
        ]);
        $this->pegawaiPangkat->update([
            'pegawai_id' => Auth()->user()->id,
            'pangkat' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => $this->status,
            'file_sk' => $this->file_sk,

        ]);
        return redirect()->route('pegawaiPangkats.index');
    }

}
