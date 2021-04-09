<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use Livewire\Component;
use App\Models\JabatanUnit;
use App\Models\Unit;

class Edit extends Component
{
    public $jabatanUnit;
    public $nama, $grade, $corporate_grade, $unit;

    public function mount(jabatanUnit $jabatanUnit)
    {
        $this->jabatanUnit = $jabatanUnit;
        $this->nama = $jabatanUnit->nama;
        $this->grade = $jabatanUnit->grade;
        $this->corporate_grade = $jabatanUnit->corporate_grade;
        $this->unit = $jabatanUnit->unit_id;
    }

    public function render()
    {
        return view('livewire.backend.jabatan-unit.edit',[
            'units' => Unit::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|unique:jabatan_unit,nama,'.$this->jabatanUnit->id,
            'grade' => 'required',
            'corporate_grade' => 'required',
            'unit' => 'required'
        ]);

        $this->jabatanUnit->update([
            'nama' => $this->nama, 
            'grade' => $this->grade,
            'corporate_grade' => $this->corporate_grade,
            'unit_id' => $this->unit
        ]);
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('jabatanUnits.index');
    }
}
