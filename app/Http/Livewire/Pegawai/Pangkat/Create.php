<?php

namespace App\Http\Livewire\Pegawai\Pangkat;

use Livewire\Component;
use App\Models\PangkatGolongan;
use App\Models\PegawaiPangkat;

class Create extends Component
{
    public $pegawai_id , $pangkat, $tmt, $file_sk, $status, $created_by, $updated_by;

    public function render()
    {
        return view('backend.pegawai.pangkat.create',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }
    
    public function store()
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required',
        ]);

        PegawaiPangkat::create([
            'pegawai_id' => Auth()->user()->id,
            'pangkat_id' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => 0,
            'file_sk' => $this->file_sk,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawaiPangkats.index');
    }
}
