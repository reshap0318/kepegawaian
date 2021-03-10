<?php

namespace App\Http\Livewire\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\{PegawaiJabatan, User};

class Index extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('backend.pegawai.jabatan.index',[
            'pegawaiJabatans' => PegawaiJabatan::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}
