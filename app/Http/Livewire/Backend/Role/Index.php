<?php

namespace App\Http\Livewire\Backend\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $role;

    public function render()
    {
        return view('livewire.backend.role.index',[
            'roles' => Role::all()
        ]);
    }

    public function deleteModel(Role $role)
    {
        $this->role = $role;
    }

    public function destroy()
    {
        if($this->role){
            $this->role->delete();
        }
    }
}
