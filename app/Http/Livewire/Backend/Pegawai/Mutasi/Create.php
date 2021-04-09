<?php

namespace App\Http\Livewire\Backend\Pegawai\Mutasi;

use App\Models\{Mutasi, User, Unit};
use Livewire\{Component, WithFileUploads};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    
    public $user;
    public $unit, $tanggal_mutasi, $file_sk;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.mutasi.create',[
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

        $fileName = uniqid("surat_keputusan_mutasi_".$this->user->pegawai->nip."_").".".$this->file_sk->extension();

        Mutasi::create([
            'pegawai_id' => $this->user->id,
            'unit_id' => $this->unit,
            'tgl_mutasi' => $this->tanggal_mutasi,
            'file_sk'  => $this->file_sk->storeAs('sk_mutasi', $fileName,'public'),
            'status' => 1,
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('pegawai.show', $this->user);
    }
}
