<?php

namespace App\Http\Livewire\Pegawai\Jabatan;

use Livewire\Component;
use App\Models\PegawaiJabatan;

class Index extends Component
{
    public function render()
    {
        return view('backend.pegawai.jabatan.index',[
            'pegawaiJabatans' => PegawaiJabatan::all()
        ]);
    }
}
