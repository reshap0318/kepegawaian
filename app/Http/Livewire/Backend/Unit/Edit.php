<?php

namespace App\Http\Livewire\Backend\Unit;

use App\Models\Unit;
use Livewire\Component;

class Edit extends Component
{
    public $nama, $parent_unit, $unit;

    public function render()
    {
        return view('livewire.backend.unit.edit',[
            'units' => Unit::where('id','<>',$this->unit->id)->get()
        ]);
    }

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->nama = $unit->nama;
        $this->parent_unit = $unit->parent_unit_id;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|unique:unit,nama,'.$this->unit->id
        ]);

        if($this->unit->id == $this->parent_unit){
            $this->addError('parent_unit', '');
        }

        $this->unit->update([
            'nama' => $this->nama,
            'parent_unit_id' => $this->parent_unit=="" ? null : $this->parent_unit
        ]);
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('units.index');
    }
}
