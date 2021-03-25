<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use App\Models\JabatanUnit;
use Livewire\Component;

class Index extends Component
{

    public $jabatanUnit;

    public function render()
    {
        return view('livewire.backend.jabatan-unit.index',[
            'jabatanUnits' => JabatanUnit::all()
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
        }
    }
}
