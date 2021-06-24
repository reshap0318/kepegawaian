<?php

namespace App\Http\Livewire\Backend\JabatanUnit;

use App\Models\{Unit, JabatanUnit};
use Livewire\Component;

class Create extends Component
{
    public $nama, $grade, $corporate_grade, $unit, $parent_jabatan_unit;

    public function render()
    {
        return view('livewire.backend.jabatan-unit.create',[
            'units' => Unit::all(),
            'jabatanUnits' => JabatanUnit::all()
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

        $isAvailable = JabatanUnit::where('unit_id',$this->unit)->whereRaw('LOWER(`nama`) = ? ',[trim(strtolower($this->nama))])->first();

        if($isAvailable){
            $this->addError('nama', 'The nama field is available for '.$isAvailable->unit->nama);
            return;
        }

        JabatanUnit::create([
            'nama' => $this->nama, 
            'grade' => $this->grade,
            'corporate_grade' => $this->corporate_grade,
            'unit_id' => $this->unit,
            'parent_jabatan_unit_id' => $this->parent_jabatan_unit
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('jabatanUnits.index');
    }
}
