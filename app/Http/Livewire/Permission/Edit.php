<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
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
        return view('backend.permission.edit');
    }

    public function update()
    {
        $this->validate([
            'permission' => 'required|unique:permissions,name,'.$this->permission->id,
        ]);

        $this->mPermission->update(['name'=>$this->permission]);
        return redirect()->route('permisssions.index');
    }
}
