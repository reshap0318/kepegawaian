<?php

namespace App\Http\Livewire\Fungsional;

use App\Models\Fungsional;
use Livewire\Component;

class Create extends Component
{
    public $nama, $grade;

    public function render()
    {
        return view('backend.fungsional.create');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'grade' => 'required'
        ]);

        Fungsional::create([
            'nama' => $this->nama,
            'grade' => $this->grade
        ]);
        return redirect()->route('fungsionals.index');
    }
}
