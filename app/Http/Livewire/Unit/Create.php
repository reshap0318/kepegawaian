<?php

namespace App\Http\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{
    public $nama, $parent_unit;

    public function render()
    {
        return view('backend.unit.create',[
            'units' => Unit::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|unique:unit,nama'
        ]);

        Unit::create([
            'nama' => $this->nama,
            'parent_unit_id' => $this->parent_unit
        ]);
        return redirect()->route('units.index');
    }
}
