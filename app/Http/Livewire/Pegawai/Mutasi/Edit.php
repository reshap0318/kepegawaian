<?php

namespace App\Http\Livewire\Pegawai\Mutasi;

use App\Models\{User,Mutasi, Unit};
use Livewire\Component;

class Edit extends Component
{
    public $user, $mutasi;
    public $unit, $tanggal_mutasi, $file_sk;

    public function mount(User $user, Mutasi $mutasi)
    {
        $this->user = $user;
        $this->mutasi = $mutasi;
        $this->unit = $mutasi->unit_id;
        $this->tanggal_mutasi = $mutasi->tgl_mutasi;
        $this->file_sk = $mutasi->file_sk;
    }

    public function render()
    {
        return view('backend.pegawai.mutasi.edit', [
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

        return redirect()->route('pegawaiMutasis.index', $this->user);
    }
}
