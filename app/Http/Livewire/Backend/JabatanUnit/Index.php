<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use App\Models\JabatanUnit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backend.jabatan-unit.index',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }
}
