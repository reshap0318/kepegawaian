<?php

namespace App\Http\Livewire\Backend\Pegawai\Fungsional;

use Livewire\Component;
use App\Models\{Fungsional,User};
use App\Models\PegawaiFungsional;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    
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
            'file_sk' => ''
        ]);

        $this->pegawaiFungsional->update([
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk,
            'status' => 1,
            'updated_by' =>Auth()->user()->id
        ]);
        
        return redirect()->route('pegawaiFungsionals.index', $this->user);
    }
}
