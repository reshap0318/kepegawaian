<?php

namespace App\Http\Livewire\Frontend\Fungsional;

use App\Notifications\userNotification;
use Livewire\{Component, WithFileUploads};
use App\Models\{Fungsional, PegawaiFungsional, User};
use Illuminate\Support\Facades\{Auth, Notification};

class Edit extends Component
{    
    use WithFileUploads;

    public $pegawaiFungsional, $user;
    public $fungsional, $tmt, $file_sk;

    public function mount(PegawaiFungsional $pegawaiFungsional)
    {        
        $this->pegawaiFungsional = $pegawaiFungsional;
        $this->fungsional = $pegawaiFungsional->fungsional_id;
        $this->tmt = $pegawaiFungsional->tmt;

        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.fungsional.edit', [
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'fungsional' => 'required',
            'tmt' => 'required',
        ]);

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]);
            $fileName = explode("/",$this->pegawaiFungsional->file_sk)[1];
            $this->pegawaiFungsional->update([
                'file_sk'  => $this->file_sk->storeAs('sk_fungsional', $fileName,'public')
            ]);
        }

        $this->pegawaiFungsional->update([
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'status' => 0,
            'updated_by' =>Auth()->user()->id
        ]);
        $data = [
            'pesan' => 'User '.$this->user->pegawai->nama.' Melakukan Perubahan Riwayat Fungsional',
            'link' => route('pegawai.show', $this->user)
        ];
        $adminUnit = User::adminUnit($this->user->pegawai->myParent())->get();
        Notification::send($adminUnit, new userNotification($data));
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('frontend.pegawai.index');
    }
}
