<?php

namespace App\Http\Livewire\Backend\Pegawai\Mutasi;

use App\Models\{User,Mutasi, Unit};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\{Component, WithFileUploads};

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $user, $mutasi;
    public $unit, $tanggal_mutasi, $file_sk;

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
        return view('livewire.backend.pegawai.mutasi.edit', [
            'units' => Unit::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'unit' => 'required',
            'tanggal_mutasi' => 'required'
        ]);

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]);
            $fileName = "surat_keputusan_mutasi_".$this->user->pegawai->nip.".".$this->file_sk->extension();
            $this->mutasi->update([
                'file_sk'  => $this->file_sk->storeAs('sk_mutasi', $fileName,'public')
            ]);
        }

        $this->mutasi->update([
            'unit_id' => $this->unit,
            'tgl_mutasi' => $this->tanggal_mutasi,
            'status' => 1,
            'updated_by' => Auth()->user()->id
        ]);

        return redirect()->route('pegawai.show', $this->user);
    }
}
