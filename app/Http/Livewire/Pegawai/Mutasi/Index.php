<?php

namespace App\Http\Livewire\Pegawai\Mutasi;

use App\Models\{Mutasi, User};
use Livewire\Component;

class Index extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('backend.pegawai.mutasi.index', [
            'pegawaiMutasis' => Mutasi::all()
        ]);
    }
}
