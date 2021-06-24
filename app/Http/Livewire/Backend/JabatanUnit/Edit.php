<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use Livewire\Component;
use App\Models\JabatanUnit;
use App\Models\Unit;

class Edit extends Component
{
    public $jabatanUnit;
    public $nama, $grade, $corporate_grade, $unit, $parent_jabatan_unit;

    public function mount(jabatanUnit $jabatanUnit)
    {
        $this->jabatanUnit = $jabatanUnit;
        $this->nama = $jabatanUnit->nama;
        $this->grade = $jabatanUnit->grade;
        $this->corporate_grade = $jabatanUnit->corporate_grade;
        $this->unit = $jabatanUnit->unit_id;
        $this->parent_jabatan_unit = $jabatanUnit->parent_jabatan_unit_id;
    }

    public function render()
    {
        return view('livewire.backend.jabatan-unit.edit',[
            'units' => Unit::all(),
            'jabatanUnits' => JabatanUnit::all()
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

        $isAvailable = JabatanUnit::where('unit_id',$this->unit)->whereRaw('LOWER(`nama`) = ? ',[trim(strtolower($this->nama))])->where('id', '<>', $this->jabatanUnit->id)->first();

        if($isAvailable){
            $this->addError('nama', 'The nama field is available for '.$isAvailable->unit->nama);
            return;
        }

        $this->jabatanUnit->update([
            'nama' => $this->nama, 
            'grade' => $this->grade,
            'corporate_grade' => $this->corporate_grade,
            'unit_id' => $this->unit,
            'parent_jabatan_unit_id' => $this->parent_jabatan_unit
        ]);
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('jabatanUnits.index');
    }
}
