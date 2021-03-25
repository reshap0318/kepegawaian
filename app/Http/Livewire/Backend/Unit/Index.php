<?php

namespace App\Http\Livewire\Backend\Unit;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    public $unit;

    public function render()
    {
        return view('livewire.backend.unit.index',[
            'units' => Unit::orderby('parent_unit_id','asc')->get()
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
        }
    }
}
