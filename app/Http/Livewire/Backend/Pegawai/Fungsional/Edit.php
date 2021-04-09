<?php

namespace App\Http\Livewire\Backend\Pegawai\Fungsional;

use Livewire\{Component, WithFileUploads};
use App\Models\{Fungsional,User};
use App\Models\PegawaiFungsional;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    
    public $pegawaiFungsional, $user;
    public $fungsional, $tmt, $file_sk;

    public function mount(User $user,PegawaiFungsional $pegawaiFungsional)
    {
        $this->authorize('viewPegawai',$user);
        
        $this->pegawaiFungsional = $pegawaiFungsional;
        $this->fungsional = $pegawaiFungsional->fungsional_id;
        $this->tmt = $pegawaiFungsional->tmt;

        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.fungsional.edit', [
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
            $fileName = explode("/",$this->pegawaiFungsional->file_sk)[1];
            $this->pegawaiFungsional->update([
                'file_sk'  => $this->file_sk->storeAs('sk_fungsional', $fileName,'public')
            ]);
        }

        $this->pegawaiFungsional->update([
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'status' => 1,
            'updated_by' =>Auth()->user()->id
        ]);
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('pegawai.show', $this->user);
    }
}
