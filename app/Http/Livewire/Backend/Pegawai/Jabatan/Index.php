<?php

namespace App\Http\Livewire\Backend\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\{PegawaiJabatan, User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    
    public $user;

    public function mount(User $user, PegawaiJabatan $pegawaiJabatan)
    {
        $this->authorize('viewPegawai',$user);
        
        $this->pegawaiJabatan = $pegawaiJabatan;
        $this->jabatan = $pegawaiJabatan->jabatan_id;
        $this->tanggal_mulai = $pegawaiJabatan->tgl_mulai;
        $this->tanggal_selesai = $pegawaiJabatan->tgl_selesai;
        $this->file_sk = $pegawaiJabatan->file_sk;

        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.jabatan.index',[
            'pegawaiJabatans' => PegawaiJabatan::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}
