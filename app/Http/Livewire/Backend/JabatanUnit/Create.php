<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use App\Models\JabatanUnit;
use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{
    public $nama, $grade, $corporate_grade, $unit;

    public function render()
    {
        return view('livewire.backend.jabatan-unit.create',[
            'units' => Unit::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'grade' => 'required',
            'corporate_grade' => 'required',
            'unit' => 'required'
        ]);

        JabatanUnit::create([
            'nama' => $this->nama, 
            'grade' => $this->grade,
            'corporate_grade' => $this->corporate_grade,
            'unit_id' => $this->unit
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('jabatanUnits.index');
    }
}
