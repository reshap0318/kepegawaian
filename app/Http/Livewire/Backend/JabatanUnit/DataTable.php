<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use App\Models\JabatanUnit;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\{Column};
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = JabatanUnit::class;

    public $createLink = "";

    public function delete($id)
    {
        $this->model::destroy($id);
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
    }

    public function columns()
    {
        $col = [
            Column::name('nama')->sortBy('jabatan_unit.id')->defaultSort('asc')->searchable(),

            Column::name('unit.nama')->label('Unit')->searchable(),

            Column::callback('id', function($id)
            {
                return $this->model::find($id)->parent->nama.' '.$this->model::find($id)->parent->unit->nama;
            })->label('Atasan')->searchable(),
            
            Column::name('grade')->label('Grade')->hide()->searchable(),
            
            Column::name('corporate_grade')->label('Corporate Grade')->hide()->searchable(),
        ];

        $action = Column::callback(['id', 'nama'], function ($id, $nama) {
            return view('livewire.datatables.edit-delete', [
                'editLink' => route('jabatanUnits.edit', $id), 
                'id' => $id,
                'value' => $nama
            ]);
        });

        if(Auth::user()->hasPermissionTo('jabatan-units_manage')){
            array_push($col, $action);
        }

        return $col; 
    }
}
