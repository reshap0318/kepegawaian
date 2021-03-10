<?php

namespace App\Http\Livewire\JabatanUnit;

use App\Models\JabatanUnit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('backend.jabatan-unit.index',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }
}
