<?php

namespace App\Http\Livewire\Pegawai\Fungsional;

use Livewire\Component;
use App\Models\Fungsional;
use App\Models\PegawaiFungsional;

class Edit extends Component
{
    public $pegawaiFungsional;
    public $fungsional, $tmt, $file_sk;

    public function mount(PegawaiFungsional $pegawaiFungsional)
    {
        $this->pegawaiFungsional = $pegawaiFungsional;
        $this->fungsional = $pegawaiFungsional->fungsional_id;
        $this->tmt = $pegawaiFungsional->tmt;
    }

    public function render()
    {
        return view('backend.pegawai.fungsional.edit', [
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'fungsional' => 'required',
            'tmt' => 'required',
            'file_sk' => ''
        ]);

        $this->pegawaiFungsional->update([
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk,
            'status' => 0,
            'updated_by' =>Auth()->user()->id
        ]);
        
        return redirect()->route('pegawaiFungsional.index');
    }
}
