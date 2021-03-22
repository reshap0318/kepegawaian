<?php

namespace App\Http\Livewire\Backend\Pegawai\Mutasi;

use App\Models\{Mutasi, User, Unit};
use Livewire\Component;

class Create extends Component
{
    public $user;
    public $unit, $tanggal_mutasi, $file_sk;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.mutasi.create',[
            'units' => Unit::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'unit' => 'required',
            'tanggal_mutasi' => 'required',
            'file_sk' => ''
        ]);

        Mutasi::create([
            'pegawai_id' => $this->user->id,
            'unit_id' => $this->unit,
            'tgl_mutasi' => $this->tanggal_mutasi,
            'file_sk'  => $this->file_sk,
            'status' => 1,
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id
        ]);

        return redirect()->route('pegawai.show', $this->user);
    }
}
