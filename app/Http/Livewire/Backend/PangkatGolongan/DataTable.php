<?php

namespace App\Http\Livewire\Backend\PangkatGolongan;

use App\Models\PangkatGolongan;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\{Column};
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = PangkatGolongan::class;

    public $createLink = "";

    public function delete($id)
    {
        $this->model::destroy($id); 
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
    }

    public function columns()
    {

        $col = [
            Column::name('nama')->searchable()->sortBy('golongan')->defaultSort('asc'),

            Column::name('golongan')->searchable(),
        ];

        $action = Column::callback(['id', 'nama'], function ($id, $nama) {
            return view('livewire.datatables.edit-delete', [
                'editLink' => route('pangkatGolongans.edit', $id), 
                'id' => $id,
                'value' => $nama
            ]);
        });

        if(Auth::user()->hasPermissionTo('pangkat-golongans_manage')){
            array_push($col, $action);
        }

        return $col;
    }
}
