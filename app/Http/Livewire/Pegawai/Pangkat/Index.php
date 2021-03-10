<?php

namespace App\Http\Livewire\Pegawai\Pangkat;

use Livewire\Component;
use App\Models\PegawaiPangkat;

class Index extends Component
{
    public function render()
    {
        return view('backend.pegawai.pangkat.index',[
            'pegawaiPangkats' => PegawaiPangkat::all()
        ]);
    }
}
