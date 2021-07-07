<?php

namespace App\Http\Livewire\Backend\ApiAkses;

use App\Models\ApiAkses;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\{Column};
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = ApiAkses::class;

    public $createLink = "";
    
    public function delete($id)
    {
        $this->model::destroy($id);
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
    }

    public function columns()
    {
        $col = [
            Column::name('nama')->searchable()->sortBy('id')->defaultSort('asc'),
            
            Column::name('app_key')->label('Grade')->searchable(),

            Column::name('created_at')->label('Created At'),
            
        ];

        $action = Column::callback(['id', 'nama'], function ($id, $nama) {
            return view('livewire.datatables.edit-delete', [
                'editLink' => route('apiAksess.edit', $id), 
                'id' => $id,
                'value' => $nama
            ]);
        });
        if(Auth::user()->hasPermissionTo('api-akses_manage')){
            array_push($col, $action);
        }

        return $col; 
    }
}
