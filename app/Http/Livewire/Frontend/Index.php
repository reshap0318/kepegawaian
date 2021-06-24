<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\{Component, WithFileUploads};

class Index extends Component
{

    use WithFileUploads;

    public $user, $file_sk_pns, $file_sk_cpns;

    public function mount(){
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.index');
    }

    public function updatedFileSkCpns()
    {
        $this->validate([
            'file_sk_cpns' => 'file|mimes:pdf',
        ]);
        $fileName = "surat_keputusan_calon_pegawai_negeri_sipil_".$this->user->pegawai->nip.".".$this->file_sk_cpns->extension();
        $this->user->pegawai->file_sk_cpns = $this->file_sk_cpns->storeAs('sk_cpns', $fileName,'public');
        $this->user->pegawai->update();
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Updated!', 'message' => '']);
    }

    public function updatedFileSkPns()
    {
        $this->validate([
            'file_sk_pns' => 'file|mimes:pdf',
        ]);
        $fileName = "surat_keputusan_pegawai_negeri_sipil_".$this->user->pegawai->nip.".".$this->file_sk_pns->extension();
        $this->user->pegawai->file_sk_pns = $this->file_sk_pns->storeAs('sk_pns', $fileName,'public');
        $this->user->pegawai->update(); 
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Updated!', 'message' => '']);
    }
}
