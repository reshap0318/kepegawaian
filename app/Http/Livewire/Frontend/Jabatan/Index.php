<?php

namespace App\Http\Livewire\Frontend\Jabatan;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\{PegawaiJabatan, User};

class Index extends Component
{
    
    public $user, $pegawaiJabatan;

    public function mount()
    {
        $this->user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.frontend.jabatan.index',[
            'pegawaiJabatans' => PegawaiJabatan::where('pegawai_id', $this->user->id)->get()
        ]);
    }

    public function deleteModel(PegawaiJabatan $pegawaiJabatan)
    {
        $this->pegawaiJabatan = $pegawaiJabatan;
    }

    public function destroy()
    {
        if($this->pegawaiJabatan){
            $this->pegawaiJabatan->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}

