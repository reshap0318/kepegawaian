<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use App\Models\JabatanUnit;
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;

    public $jabatanUnit, $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.backend.jabatan-unit.index',[
            'jabatanUnits' => JabatanUnit::select('jabatan_unit.*')->with('unit')->leftJoin('unit','jabatan_unit.unit_id','=','unit.id')->where('jabatan_unit.nama','like','%'.$this->search.'%')->orWhere('grade','like','%'.$this->search.'%')->orWhere('corporate_grade','like','%'.$this->search.'%')->orWhere('unit.nama','like','%'.$this->search.'%')->orderby('unit_id','asc')->paginate(5)
            ]);
    }

    public function deleteModel(JabatanUnit $jabatanUnit)
    {
        $this->jabatanUnit = $jabatanUnit;
    }

    public function destroy()
    {
        if($this->jabatanUnit){
            $this->jabatanUnit->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
