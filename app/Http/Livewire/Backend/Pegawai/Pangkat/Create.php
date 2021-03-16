<?php

namespace App\Http\Livewire\Backend\Pegawai\Pangkat;

use Livewire\Component;
use App\Models\{PangkatGolongan, PegawaiPangkat, User};

class Create extends Component
{
    public $pangkat, $tmt, $file_sk;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.pangkat.create',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }
    
    public function store()
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required',
        ]);

        PegawaiPangkat::create([
            'pegawai_id' => $this->user->id,
            'pangkat_id' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => 1,
            'file_sk' => $this->file_sk,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawaiPangkats.index', $this->user);
    }
}
