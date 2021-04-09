<?php

namespace App\Http\Livewire\Backend\ApiAkses;

use App\Models\ApiAkses;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $nama;

    public function render()
    {
        return view('livewire.backend.api-akses.create');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
        ]);

        ApiAkses::create([
            'nama' => $this->nama,
            'app_key' => "PUSDAPEG-".Str::random(60)
        ]);
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('apiAksess.index');
    }
}
