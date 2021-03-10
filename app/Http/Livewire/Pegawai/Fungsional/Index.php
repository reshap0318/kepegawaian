<?php

namespace App\Http\Livewire\Pegawai\Fungsional;

use App\Models\PegawaiFungsional;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('backend.pegawai.fungsional.index',[
            'pegawaiFungsionals' => PegawaiFungsional::all()
        ]);
    }
}
