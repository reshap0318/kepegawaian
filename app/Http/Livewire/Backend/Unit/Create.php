<?php

namespace App\Http\Livewire\Backend\Unit;

use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{
    public $nama, $parent_unit;

    public function render()
    {
        return view('livewire.backend.unit.create',[
            'units' => Unit::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|unique:unit,nama',
            'parent_unit' => 'required'
        ]);

        Unit::create([
            'nama' => $this->nama,
            'parent_unit_id' => $this->parent_unit
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('units.index');
    }
}
