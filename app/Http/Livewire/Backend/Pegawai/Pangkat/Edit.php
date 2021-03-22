<?php

namespace App\Http\Livewire\Backend\Pegawai\Pangkat;

use App\Models\{PangkatGolongan, PegawaiPangkat,User};
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    
    public $pegawaiPangkat, $user;
    public $pangkat, $tmt, $status, $file_sk;
    
    public function render()
    {
        return view('livewire.backend.pegawai.pangkat.edit',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }

    public function mount(User $user, PegawaiPangkat $pegawaiPangkat)
    {
        $this->authorize('viewPegawai',$user);
        
        $this->pegawaiPangkat = $pegawaiPangkat;
        $this->pangkat = $pegawaiPangkat->pangkat_id;
        $this->tmt = $pegawaiPangkat->tmt;
        $this->file_sk = $pegawaiPangkat->file_sk;

        $this->user = $user;

    }

    public function update()
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required'
        ]);

        $this->pegawaiPangkat->update([
            'pangkat' => $this->pangkat,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk,
            'status' => 1,
            'created_by' => Auth()->user()->id,
        ]);

        return redirect()->route('pegawai.show', $this->user);
    }

}
