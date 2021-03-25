<?php

namespace App\Http\Livewire\Backend\Pegawai\Jabatan;

use Livewire\{Component, WithFileUploads};
use App\Models\{PegawaiJabatan, JabatanUnit, User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $jabatan, $tanggal_mulai, $tanggal_selesai, $file_sk;
    public $user;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.backend.pegawai.jabatan.create',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }
    public function store()
    {
        $this->validate([
            'jabatan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'file_sk' => 'required|file|mimes:pdf'
        ]);

        $fileName = "surat_keputusan_jabatan_".$this->user->pegawai->nip.".".$this->file_sk->extension();

        PegawaiJabatan::create([
            'pegawai_id' => $this->user->id,
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tanggal_mulai,
            'tgl_selesai' => $this->tanggal_selesai,
            'status' => 1,
            'file_sk' => $this->file_sk->storeAs('sk_jabatan', $fileName,'public'),
            'created_by' => Auth()->user()->id,
            'updated_by' =>Auth()->user()->id
        ]);

        return redirect()->route('pegawai.show',$this->user);
    }
}
