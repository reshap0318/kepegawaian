<?php

namespace App\Http\Livewire\Pegawai\Fungsional;

use App\Models\User;
use App\Models\PegawaiFungsional;
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
        return view('backend.pegawai.fungsional.index',[
            'pegawaiFungsionals' => PegawaiFungsional::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}
