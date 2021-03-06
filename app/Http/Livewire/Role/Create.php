<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\{Role,Permission};

class Create extends Component
{
    public $name, $permissions = [];

    public function render()
    {
        return view('livewire.role.create', [
            'permit' => Permission::all(),
            'role' => new Role()
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:roles,name'
        ]);
        $role = Role::create(['name'=>$this->name]);
        $role->givePermissionTo($this->permissions);
        return redirect()->route('roles.index');
    }
}
