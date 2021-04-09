<?php

namespace App\Http\Livewire\Backend\Pegawai\Fungsional;

use App\Models\{Fungsional, User};
use App\Models\PegawaiFungsional;
use Livewire\{Component, WithFileUploads};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $fungsional, $tmt, $file_sk;
    public $user;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.fungsional.create', [
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
            'pegawai_id' => $this->user->id,
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk->storeAs('sk_fungsional', $fileName,'public'),
            'status' => 1,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('pegawai.show', $this->user);

    }
}
