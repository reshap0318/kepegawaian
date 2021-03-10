<?php

namespace App\Http\Livewire\PangkatGolongan;

use Livewire\Component;
use App\Models\PangkatGolongan;

class Create extends Component
{
    public $nama, $golongan;
    public function render()
    {
        return view('backend.pangkat-golongan.create');
    }
    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'golongan' => 'required'
        ]);

        PangkatGolongan::create([
            'nama' => $this->nama,
            'golongan' => $this->golongan
        ]);
        return redirect()->route('pangkatGolongans.index');
    }
}
