<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public function render()
    {
        return view('backend.permission.index',[
            'permissions' => Permission::all()
        ]);
    }
}
