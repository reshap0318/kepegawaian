<?php

namespace App\Http\Livewire\Backend\Permission;

use Spatie\Permission\Models\Permission;
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $permission;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.backend.permission.index',[
            'permissions' => Permission::where('name','like','%'.$this->search.'%')->paginate(5)
        ]);
    }

    public function deleteModel(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function destroy()
    {
        if($this->permission){
            $this->permission->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
