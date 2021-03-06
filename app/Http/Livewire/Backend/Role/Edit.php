<?php

namespace App\Http\Livewire\Backend\Role;

use Livewire\Component;
use Spatie\Permission\Models\{Role,Permission};

class Edit extends Component
{
    public $name, $role, $permissions = [];

    public function render()
    {
        return view('livewire.backend.role.edit',[
            'permit' => Permission::all(),
            'role' => new Role()
        ]);
    }

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->permissions = $role->permissions()->pluck('name')->toArray();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,'.$this->role->id
        ]);
        $this->role->update(['name'=>$this->name]);
        $this->role->givePermissionTo($this->permissions);
        return redirect()->route('roles.index');
    }
}
