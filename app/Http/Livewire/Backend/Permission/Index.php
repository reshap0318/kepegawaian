<?php

namespace App\Http\Livewire\Backend\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

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
}
