<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;

class DashPegawai extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-pegawai',[
            'pegawais' => Pegawai::whereIn('unit_id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
