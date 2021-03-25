<?php

namespace App\Http\Livewire\Frontend\Jabatan;

use Livewire\{Component, WithFileUploads};
use App\Models\{JabatanUnit, PegawaiJabatan};
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    use WithFileUploads;

    public $pegawaiJabatan, $user;
    public $jabatan, $tanggal_mulai, $tanggal_selesai, $file_sk;
  
    public function mount(PegawaiJabatan $pegawaiJabatan)
    {        
        $this->pegawaiJabatan = $pegawaiJabatan;
        $this->jabatan = $pegawaiJabatan->jabatan_id;
        $this->tanggal_mulai = $pegawaiJabatan->tgl_mulai;
        $this->tanggal_selesai = $pegawaiJabatan->tgl_selesai;

        
        $this->user =Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.jabatan.edit',[
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

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]);
            $fileName = "surat_keputusan_jabatan_".$this->user->pegawai->nip.".".$this->file_sk->extension();
            $this->pegawaiJabatan->update([
                'file_sk'  => $this->file_sk->storeAs('sk_jabatan', $fileName,'public')
            ]);
        }

        $this->pegawaiJabatan->update([
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tanggal_mulai,
            'tgl_selesai' => $this->tanggal_selesai,
            'status' => 0,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('frontend.pegawai.index');
    }
}