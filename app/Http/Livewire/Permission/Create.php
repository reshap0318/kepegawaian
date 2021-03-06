<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class Create extends Component
{

    public $permission;

    public function render()
    {
        return view('livewire.permission.create');
    }

    public function store()
    {
        $this->validate([
            'permission' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name'=>$this->permission]);
        return redirect()->route('permisssions.index');
    }
}
