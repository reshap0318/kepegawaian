<?php

namespace App\Http\Livewire\Backend\Pegawai\Fungsional;

use App\Models\{Fungsional, User};
use App\Models\PegawaiFungsional;
use Livewire\Component;

class Create extends Component
{

    public $fungsional, $tmt, $file_sk;
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.fungsional.create', [
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'fungsional' => 'required',
            'tmt' => 'required',
            'file_sk' => ''
        ]);

        PegawaiFungsional::create([
            'pegawai_id' => $this->user->id,
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk,
            'status' => 1,
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);
        return redirect()->route('pegawai.show', $this->user);

    }
}
