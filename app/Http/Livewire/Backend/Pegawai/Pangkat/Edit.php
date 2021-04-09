<?php

namespace App\Http\Livewire\Backend\Pegawai\Pangkat;

use App\Models\{PangkatGolongan, PegawaiPangkat,User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\{Component, WithFileUploads};

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    
    public $pegawaiPangkat, $user;
    public $pangkat, $tmt, $file_sk;
    
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

        $this->user = $user;

    }

    public function update()
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required'
        ]);

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]);
            $fileName = explode("/",$this->mutasi->file_sk)[1];
            $this->pegawaiPangkat->update([
                'file_sk'  => $this->file_sk->storeAs('sk_pangkat', $fileName,'public')
            ]);
        }
        
        $this->pegawaiPangkat->update([
            'pangkat' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => 1,
            'updated_by' => Auth()->user()->id,
        ]);
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('pegawai.show', $this->user);
    }

}
