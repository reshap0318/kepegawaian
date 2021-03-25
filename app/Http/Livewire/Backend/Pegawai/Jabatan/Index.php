<?php

namespace App\Http\Livewire\Backend\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\{PegawaiJabatan, User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    
    public $user , $pegawaiJabatan;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.jabatan.index',[
            'pegawaiJabatans' => PegawaiJabatan::where('pegawai_id', $this->user->id)->get()
        ]);
    }

    public function changeStatus(PegawaiJabatan $pegawaiJabatan)
    {
        $pegawaiJabatan->status = $pegawaiJabatan->status ? false : true;
        $pegawaiJabatan->update();
    }

    public function deleteModel(PegawaiJabatan $pegawaiJabatan)
    {
        $this->pegawaiJabatan = $pegawaiJabatan;
    }

    public function destroy()
    {
        if($this->pegawaiJabatan){
            $this->pegawaiJabatan->delete();
        }
    }
}
