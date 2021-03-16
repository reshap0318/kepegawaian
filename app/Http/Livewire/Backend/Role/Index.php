<?php

namespace App\Http\Livewire\Backend\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function render()
    {
        return view('livewire.backend.role.index',[
            'roles' => Role::all()
        ]);
    }
}
