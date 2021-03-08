<?php

namespace App\Http\Livewire\Fungsional;

use App\Models\Fungsional;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('backend.fungsional.index',[
            'fungsionals' => Fungsional::all()
        ]);
    }
}
