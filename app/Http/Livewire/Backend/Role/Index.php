<?php

namespace App\Http\Livewire\Backend\Role;

use Livewire\{Component, WithPagination};
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $role, $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.backend.role.index',[
            'roles' => Role::where('name','like','%'.$this->search.'%')->paginate(5)
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
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
