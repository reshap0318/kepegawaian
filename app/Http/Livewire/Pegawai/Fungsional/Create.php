<?php

namespace App\Http\Livewire\Pegawai\Fungsional;

use App\Models\Fungsional;
use App\Models\PegawaiFungsional;
use Livewire\Component;

class Create extends Component
{

    public $fungsional, $tmt, $file_sk;

    public function render()
    {
        return view('backend.pegawai.fungsional.create', [
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'fungsional' => 'required',
            'tmt' => 'required',
            'file_sk' => ''
        ]);

        PegawaiFungsional::create([
            'pegawai_id' => Auth()->user()->id,
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk,
            'status' => 0,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);
        return redirect()->route('pegawaiFungsional.index');

    }
}
