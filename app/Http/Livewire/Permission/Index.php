<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public function render()
    {
        return view('livewire.permission.index',[
            'permissions' => Permission::all()
        ]);
    }
}
