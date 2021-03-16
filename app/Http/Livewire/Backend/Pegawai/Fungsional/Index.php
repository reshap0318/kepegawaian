<?php

namespace App\Http\Livewire\Backend\Pegawai\Fungsional;

use App\Models\User;
use App\Models\PegawaiFungsional;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;

    public $user;

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
        return view('livewire.backend.pegawai.fungsional.index',[
            'pegawaiFungsionals' => PegawaiFungsional::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}
