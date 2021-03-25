<?php

namespace App\Http\Livewire\Frontend\Fungsional;

use Livewire\{Component, WithFileUploads};
use App\Models\{Fungsional, PegawaiFungsional};
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{    
    use WithFileUploads;

    public $pegawaiFungsional, $user;
    public $fungsional, $tmt, $file_sk;

    public function mount(PegawaiFungsional $pegawaiFungsional)
    {        
        $this->pegawaiFungsional = $pegawaiFungsional;
        $this->fungsional = $pegawaiFungsional->fungsional_id;
        $this->tmt = $pegawaiFungsional->tmt;

        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.fungsional.edit', [
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'fungsional' => 'required',
            'tmt' => 'required',
        
        ]);

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]);
            $fileName = "surat_keputusan_fungsional_".$this->user->pegawai->nip.".".$this->file_sk->extension();
            $this->pegawaiFungsional->update([
                'file_sk'  => $this->file_sk->storeAs('sk_fungsional', $fileName,'public')
            ]);
        }

        $this->pegawaiFungsional->update([
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'status' => 0,
            'updated_by' =>Auth()->user()->id
        ]);
        
        return redirect()->route('frontend.pegawai.index');
    }
}
