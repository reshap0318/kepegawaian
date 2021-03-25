<?php

namespace App\Http\Livewire\Frontend\Mutasi;

use App\Models\{Mutasi, Unit};
use Illuminate\Support\Facades\Auth;
use Livewire\{Component, WithFileUploads};

class Create extends Component
{
    use WithFileUploads;
    
    public $user;
    public $unit, $tanggal_mutasi, $file_sk;

    public function mount()
    {
        $this->user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.frontend.mutasi.create',[
            'units' => Unit::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'unit' => 'required',
            'tanggal_mutasi' => 'required',
            'file_sk' => 'required|file|mimes:pdf'
        ]);

        $fileName = "surat_keputusan_pangkat_".$this->user->pegawai->nip.".".$this->file_sk->extension();

        Mutasi::create([
            'pegawai_id' => $this->user->id,
            'unit_id' => $this->unit,
            'tgl_mutasi' => $this->tanggal_mutasi,
            'file_sk'  => $this->file_sk->storeAs('sk_pangkat', $fileName,'public'),
            'status' => 0,
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id
        ]);

        return redirect()->route('frontend.pegawai.index');
    }
}
