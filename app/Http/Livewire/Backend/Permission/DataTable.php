<?php

namespace App\Http\Livewire\Backend\Permission;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\{Column};
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Permission::class;

    public $createLink = "";

    public function delete($id)
    {
        $this->model::destroy($id);
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
    }

    public function columns()
    {
        $col = [
            Column::name('name')->searchable()->sortBy('permissions.id')->defaultSort('asc'),
        ];

        $action = Column::callback(['id', 'name'], function ($id, $name) {
            return view('livewire.datatables.edit-delete', [
                'editLink' => route('permissions.edit', $id), 
                'id' => $id,
                'value' => $name
            ]);
        })->alignCenter();

        if(Auth::user()->hasPermissionTo('roles_manage')){
            array_push($col, $action);
        }

        return $col;
    }
}
