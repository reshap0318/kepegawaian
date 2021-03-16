<?php

namespace App\Http\Livewire\Backend\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{

    public $permission;

    public function render()
    {
        return view('livewire.backend.permission.create');
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
