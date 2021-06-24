<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\PegawaiPangkat;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashPegPangkatGolongan extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-peg-pangkat',[
            'pegawaiPangkats' => PegawaiPangkat::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
