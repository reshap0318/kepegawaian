<?php

namespace App\Http\Livewire\Backend\PangkatGolongan;

use Livewire\Component;
use App\Models\PangkatGolongan;

class Edit extends Component
{
    public $pangkatGolongan;
    public $nama, $golongan;

    public function mount(PangkatGolongan $pangkatGolongan)
    {
        $this->pangkatGolongan = $pangkatGolongan;
        $this->nama = $pangkatGolongan->nama;
        $this->golongan = $pangkatGolongan->golongan;
    }

    public function render()
    {
        return view('livewire.backend.pangkat-golongan.edit');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|unique:pangkat_golongan,nama,'.$this->pangkatGolongan->id,
            'golongan' => 'required'
        ]);

        $this->pangkatGolongan->update([
            'nama' => $this->nama,
            'golongan' => $this->golongan
        ]);
        return redirect()->route('pangkatGolongans.index');
    }
}
