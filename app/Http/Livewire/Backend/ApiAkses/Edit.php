<?php

namespace App\Http\Livewire\Backend\ApiAkses;

use Livewire\Component;
use App\Models\ApiAkses;

class Edit extends Component
{
    public $apiAkses;
    public $nama;

    public function mount(ApiAkses $apiAkses)
    {
        $this->apiAkses = $apiAkses;
        $this->nama = $apiAkses->nama;
    }

    public function render()
    {
        return view('livewire.backend.api-akses.edit');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
        ]);

        $this->apiAkses->update([
            'nama' => $this->nama
        ]);
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('apiAksess.index');
    }
}
