<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    public function render()
    {
        if (!Gate::allows('roles_access')) {
            return abort(401);
        }
        return view('livewire.permission.index',[
            'permissions' => Permission::all()
        ]);
    }
}
