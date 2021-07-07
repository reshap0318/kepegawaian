<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\PegawaiJabatan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashPegJabatanUnit extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-peg-jabatan',[
            'pegawaiJabatans' => PegawaiJabatan::whereIn('id' , Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
