<?php

namespace App\Http\Livewire\Backend\Fungsional;

use App\Models\Fungsional;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\{Column};
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Fungsional::class;
    
    public function delete($id)
    {
        $this->model::destroy($id);
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
    }

    public function columns()
    {
        $col = [
            Column::name('nama')->searchable()->sortBy('fungsional.id')->defaultSort('asc'),
            
            Column::name('grade')->label('Grade')->searchable(),
            
        ];

        $action = Column::callback(['id', 'nama'], function ($id, $nama) {
            return view('livewire.datatables.edit-delete', [
                'editLink' => route('fungsionals.edit', $id), 
                'id' => $id,
                'value' => $nama
            ]);
        });

        if(Auth::user()->hasPermissionTo('fungsionals_manage')){
            array_push($col, $action);
        }

        return $col; 
    }
}
