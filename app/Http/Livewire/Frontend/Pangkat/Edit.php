<?php

namespace App\Http\Livewire\Frontend\Pangkat;

use App\Models\{PangkatGolongan, PegawaiPangkat};
use Illuminate\Support\Facades\Auth;
use Livewire\{Component, WithFileUploads};

class Edit extends Component
{    
    use WithFileUploads;

    public $pegawaiPangkat, $user;
    public $pangkat, $tmt, $file_sk;
    
    public function render()
    {
        return view('livewire.frontend.pangkat.edit',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }

    public function mount(PegawaiPangkat $pegawaiPangkat)
    {
        
        $this->pegawaiPangkat = $pegawaiPangkat;
        $this->pangkat = $pegawaiPangkat->pangkat_id;
        $this->tmt = $pegawaiPangkat->tmt;

        $this->user = Auth::user();

    }

    public function update()
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required'
        ]); 

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]); 
            $fileName = explode("/",$this->mutasi->file_sk)[1];
            $this->pegawaiPangkat->update([
                'file_sk'  => $this->file_sk->storeAs('sk_pangkat', $fileName,'public')
            ]);
        }
        $this->pegawaiPangkat->update([
            'pangkat_id' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => 0,
            'updated_by' => Auth()->user()->id,
        ]);
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('frontend.pegawai.index');
    }

}
