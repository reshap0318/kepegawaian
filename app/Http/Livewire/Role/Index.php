<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function render()
    {
        return view('livewire.role.index',[
            'roles' => Role::all()
        ]);
    }
}
