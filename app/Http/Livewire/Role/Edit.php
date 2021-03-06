<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\{Role,Permission};

class Edit extends Component
{
    public $name, $role, $permissions = [];

    public function render()
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        return view('livewire.role.edit',[
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
            'name' => 'required|unique:roles,name'
        ]);
        $this->role->update(['name'=>$this->name]);
        $this->role->givePermissionTo($this->permissions);
        return redirect()->route('roles.index');
    }
}
