<?php

namespace App\Http\Livewire\PangkatGolongan;

use Livewire\Component;
use App\Models\PangkatGolongan;

class Index extends Component
{
    public function render()
    {
        return view('backend.pangkat-golongan.index',[
            'pangkatgolongans' => PangkatGolongan::all()
        ]);
    }
}
