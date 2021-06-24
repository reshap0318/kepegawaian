<?php

namespace App\Http\Livewire\Backend\Unit;

use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\{Column};
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Unit::class;

    public function delete($id)
    {
        $this->model::destroy($id);
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
    }

    public function columns()
    {
        $col = [
            Column::name('nama')->searchable()->sortBy('unit.id')->defaultSort('asc'),

            Column::callback('id', function($id)
            {
                return $this->model::find($id)->parent->nama;
            })->label('Unit')->searchable(),
            
        ];

        $action = Column::callback(['id', 'nama'], function ($id, $nama) {
            return view('livewire.datatables.edit-delete', [
                'editLink' => route('units.edit', $id), 
                'id' => $id,
                'value' => $nama
            ]);
        });

        if(Auth::user()->hasPermissionTo('units_manage')){
            array_push($col, $action);
        }

        return $col; 
    }
}
