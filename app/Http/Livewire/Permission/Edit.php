<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    public $mPermission, $permission;

    public function mount(Permission $permission)
    {
        $this->mPermission = $permission;
        $this->permission = $permission->name;
    }

    public function render()
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        return view('livewire.permission.edit');
    }

    public function update()
    {
        $this->validate([
            'permission' => 'required|unique:permissions,name',
        ]);

        $this->mPermission->update(['name'=>$this->permission]);
        return redirect()->route('permisssions.index');
    }
}
