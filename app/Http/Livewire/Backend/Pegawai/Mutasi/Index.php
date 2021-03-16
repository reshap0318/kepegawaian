<?php

namespace App\Http\Livewire\Backend\Pegawai\Mutasi;

use App\Models\{Mutasi, User};
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;

    public $user;
    
    public function mount(User $user, Mutasi $mutasi)
    {
        $this->authorize('viewPegawai',$user);

        $this->user = $user;
        $this->mutasi = $mutasi;
        $this->unit = $mutasi->unit_id;
        $this->tanggal_mutasi = $mutasi->tgl_mutasi;
        $this->file_sk = $mutasi->file_sk;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.mutasi.index', [
            'pegawaiMutasis' => Mutasi::all()
        ]);
    }
}
