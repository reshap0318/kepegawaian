<?php

namespace App\Http\Livewire\Frontend\Fungsional;

use App\Models\{Fungsional, PegawaiFungsional, User};
use Illuminate\Support\Facades\{Auth, Notification};
use App\Notifications\userNotification;
use Livewire\{Component, WithFileUploads};

class Create extends Component
{
    use WithFileUploads;

    public $fungsional, $tmt, $file_sk;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.fungsional.create', [
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            'fungsional' => 'required',
            'tmt' => 'required',
            'file_sk' => 'required|file|mimes:pdf'
        ]);
        
        $fileName = uniqid("surat_keputusan_fungsional_".$this->user->pegawai->nip."_").".".$this->file_sk->extension();

        PegawaiFungsional::create([
            'pegawai_id' => $this->user->id,
            'fungsional_id' => $this->fungsional,
            'tmt' => $this->tmt,
            'file_sk' => $this->file_sk->storeAs('sk_fungsional', $fileName,'public'),
            'status' => 0,
            'created_by' => $this->user->id,
            'updated_by' =>$this->user->id
        ]);
        $data = [ 
            'pesan' => 'User '.$this->user->pegawai->nama.' Melakukan Pengajuan Riwayat Fungsional',
            'user_id' => $this->user->id
        ];
        $adminUnit = User::adminUnit($this->user->pegawai->myParent())->get();
        Notification::send($adminUnit, new userNotification($data));
        
        session()->flash('success', 'Successfully saved!');
        return redirect()->route('frontend.pegawai.index');

    }
}
