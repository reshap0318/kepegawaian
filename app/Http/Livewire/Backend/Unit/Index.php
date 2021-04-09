<?php

namespace App\Http\Livewire\Backend\Unit;

use App\Models\Unit;
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;
    
    public $unit, $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.backend.unit.index',[
            'units' => Unit::where('nama','like','%'.$this->search.'%')->orWhereRaw("parent_unit_id in (select id from unit where nama like '%$this->search%')")->orderby('parent_unit_id','asc')->paginate(5)
        ]);
    }

    public function deleteModel(Unit $unit)
    {
        $this->unit = $unit;
    }

    public function destroy()
    {
        if($this->unit){
            $this->unit->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
