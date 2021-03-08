<?php

namespace App\Http\Livewire\Fungsional;

use App\Models\Fungsional;
use Livewire\Component;

class Edit extends Component
{
    public $fungsional;
    public $nama, $grade;

    public function mount(Fungsional $fungsional)
    {
        $this->fungsional = $fungsional;
        $this->nama = $fungsional->nama;
        $this->grade = $fungsional->grade;
    }

    public function render()
    {
        return view('backend.fungsional.edit');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|unique:fungsional,nama,'.$this->fungsional->id,
            'grade' => 'required'
        ]);

        Fungsional::create([
            'nama' => $this->nama,
            'grade' => $this->grade
        ]);
        return redirect()->route('fungsionals.index');
    }
}
