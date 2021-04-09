<?php

namespace App\Http\Livewire\Frontend\Fungsional;

use Livewire\{Component, WithFileUploads};
use App\Models\PegawaiFungsional;
use App\Models\Fungsional;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    use WithFileUploads;

    public $fungsional, $tmt, $file_sk;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.fungsional.create', [
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'fungsional' => 'required',
            'tmt' => 'required',
            'file_sk' => 'required|file|mimes:pdf'
        ]);
        
        $fileName = uniqid("surat_keputusan_fungsional_".$this->user->pegawai->nip."_").".".$this->file_sk->extension();

        PegawaiFungsional::create([
            'pegawai_id' => Auth()->user()->id,
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk->storeAs('sk_fungsional', $fileName,'public'),
            'status' => 0,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('frontend.pegawai.index');

    }
}
