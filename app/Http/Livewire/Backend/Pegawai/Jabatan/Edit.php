<?php

namespace App\Http\Livewire\Backend\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\{JabatanUnit, PegawaiJabatan, User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;

    public $pegawaiJabatan, $user;
    public $jabatan, $tanggal_mulai, $tanggal_selesai, $file_sk;
  
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
        return view('livewire.backend.pegawai.jabatan.edit',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'jabatan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $this->pegawaiJabatan->update([
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tanggal_mulai,
            'tgl_selesai' => $this->tanggal_selesai,
            'status' => 1,
            'file_sk' => $this->file_sk,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawaiJabatans.index', $this->user);
    }

}
