<?php

namespace App\Http\Livewire\Frontend\Pangkat;

use Illuminate\Support\Facades\{Auth, Notification};
use App\Notifications\userNotification;
use Livewire\{Component, WithFileUploads};
use App\Models\{PangkatGolongan, PegawaiPangkat, User};

class Create extends Component
{
    use WithFileUploads;

    public $pangkat, $tmt, $file_sk; 
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.pangkat.create',[
            'pangkatGolongans' => PangkatGolongan::all()
        ]);
    }
    
    public function store() 
    {
        $this->validate([
            'pangkat' => 'required',
            'tmt' => 'required',
            'file_sk' => 'required|file|mimes:pdf'
        ]);

        $fileName = uniqid("surat_keputusan_pangkat_".$this->user->pegawai->nip."_").".".$this->file_sk->extension();

        PegawaiPangkat::create([
            'pegawai_id' => $this->user->id,
            'pangkat_id' => $this->pangkat,
            'tmt' => $this->tmt,
            'status' => 0,
            'file_sk'  => $this->file_sk->storeAs('sk_pangkat', $fileName,'public'),
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);
        $data = [
            'pesan' => 'User '.$this->user->pegawai->nama.' Melakukan Pengajuan Riwayat Pangkat',
            'user_id' => $this->user->id
        ];
        $adminUnit = User::adminUnit($this->user->pegawai->myParent())->get();
        Notification::send($adminUnit, new userNotification($data));
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('frontend.pegawai.index');
    }
}
