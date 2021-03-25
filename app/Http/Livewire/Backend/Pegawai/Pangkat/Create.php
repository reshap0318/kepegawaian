<?php

namespace App\Http\Livewire\Backend\Pegawai\Pangkat;

use Livewire\{Component, WithFileUploads};
use App\Models\{PangkatGolongan, PegawaiPangkat, User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $pangkat, $tmt, $file_sk;
    public $user;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.pangkat.create',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }
    
    public function store()
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required',
            'file_sk' => 'required|file|mimes:pdf'
        ]);

        $fileName = "surat_keputusan_pangkat_".$this->user->pegawai->nip.".".$this->file_sk->extension();

        PegawaiPangkat::create([
            'pegawai_id' => $this->user->id,
            'pangkat_id' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => 1,
            'file_sk'  => $this->file_sk->storeAs('sk_pangkat', $fileName,'public'),
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawai.show', $this->user);
    }
}
