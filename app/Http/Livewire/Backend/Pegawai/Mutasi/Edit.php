<?php

namespace App\Http\Livewire\Backend\Pegawai\Mutasi;

use App\Models\{User,Mutasi, Unit};
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;

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
            'tanggal_mutasi' => 'required',
            'file_sk' => ''
        ]);

        $this->mutasi->update([
            'unit_id' => $this->unit,
            'tgl_mutasi' => $this->tanggal_mutasi,
            'file_sk'  => $this->file_sk,
            'status' => 1,
            'updated_by' => Auth()->user()->id
        ]);

        return redirect()->route('pegawai.show', $this->user);
    }
}
