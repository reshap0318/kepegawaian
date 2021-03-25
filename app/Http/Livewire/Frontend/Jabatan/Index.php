<?php

namespace App\Http\Livewire\Frontend\Jabatan;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\{PegawaiJabatan, User};

class Index extends Component
{
    
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.frontend.jabatan.index',[
            'pegawaiJabatans' => PegawaiJabatan::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}

