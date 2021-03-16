<?php

namespace App\Http\Livewire\Backend\Pegawai\Pangkat;

use Livewire\Component;
use App\Models\{PegawaiPangkat, User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    
    public $user;

    public function mount(User $user, PegawaiPangkat $pegawaiPangkat)
    {
        $this->authorize('viewPegawai',$user);
        
        $this->pegawaiPangkat = $pegawaiPangkat;
        $this->pangkat = $pegawaiPangkat->pangkat_id;
        $this->tmt = $pegawaiPangkat->tmt;
        $this->file_sk = $pegawaiPangkat->file_sk;

        $this->user = $user;

    }

    public function render() 
    {
        return view('livewire.backend.pegawai.pangkat.index',[
            'pegawaiPangkats' => PegawaiPangkat::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}
