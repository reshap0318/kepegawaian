<?php

namespace App\Http\Livewire\Backend\Unit;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backend.unit.index',[
            'units' => Unit::all()
        ]);
    }
}
