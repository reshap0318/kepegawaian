<?php

namespace App\Http\Livewire\Backend\Fungsional;

use App\Models\Fungsional;
use Livewire\Component;

class Create extends Component
{
    public $nama, $grade;

    public function render()
    {
        return view('livewire.backend.fungsional.create');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|unique:fungsional,nama',
            'grade' => 'required'
        ]);

        Fungsional::create([
            'nama' => $this->nama,
            'grade' => $this->grade
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('fungsionals.index');
    }
}
