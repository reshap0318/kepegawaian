<?php

namespace App\Http\Livewire\Backend\Pegawai;

use App\Models\User;
use Livewire\{Component, WithFileUploads};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Show extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $user, $file_sk_pns, $file_sk_cpns;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.show');
    }

    public function updatedFileSkCpns()
    {
        $this->validate([
            'file_sk_cpns' => 'file|mimes:pdf',
        ]);  
        $fileName = "surat_keputusan_calon_pegawai_negeri_sipil_".$this->user->pegawai->nip.".".$this->file_sk_cpns->extension();
        $this->user->pegawai->file_sk_cpns = $this->file_sk_cpns->storeAs('sk_cpns', $fileName,'public');
        $this->user->pegawai->update();
        $this->user = $this->user;
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
        $this->user = $this->user;
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Updated!', 'message' => '']);
    }
}
