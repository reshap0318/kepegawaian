<?php

namespace App\Http\Livewire\Pegawai\Pangkat;

use Livewire\Component;
use App\Models\{PegawaiPangkat, User};

class Index extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render() 
    {
        return view('backend.pegawai.pangkat.index',[
            'pegawaiPangkats' => PegawaiPangkat::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}
