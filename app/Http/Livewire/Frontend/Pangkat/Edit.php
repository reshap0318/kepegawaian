<?php

namespace App\Http\Livewire\Frontend\Pangkat;

use Illuminate\Support\Facades\{Auth, Notification};
use App\Notifications\userNotification;
use Livewire\{Component, WithFileUploads};
use App\Models\{PangkatGolongan, PegawaiPangkat, User};

class Edit extends Component
{    
    use WithFileUploads;

    public $pegawaiPangkat, $user;
    public $pangkat, $tmt, $file_sk;
    
    public function render()
    {
        return view('livewire.frontend.pangkat.edit',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }

    public function mount(PegawaiPangkat $pegawaiPangkat)
    {
        
        $this->pegawaiPangkat = $pegawaiPangkat;
        $this->pangkat = $pegawaiPangkat->pangkat_id;
        $this->tmt = $pegawaiPangkat->tmt;

        $this->user = Auth::user();

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
            'pangkat_id' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => 0,
            'updated_by' => Auth()->user()->id,
        ]);
        $data = [
            'pesan' => 'User '.$this->user->pegawai->nama.' Melakukan Perubahan Riwayat Pangkat',
            'link' => route('pegawai.show', $this->user)
        ];
        $adminUnit = User::adminUnit($this->user->pegawai->myParent())->get();
        Notification::send($adminUnit, new userNotification($data));
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('frontend.pegawai.index');
    }

}
