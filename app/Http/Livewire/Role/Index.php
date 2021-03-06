<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function render()
    {
        if (!Gate::allows('roles_access')) {
            return abort(401);
        }
        return view('livewire.role.index',[
            'roles' => Role::all()
        ]);
    }
}
