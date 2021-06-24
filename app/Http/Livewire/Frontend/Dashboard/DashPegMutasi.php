<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use App\Models\Mutasi;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashPegMutasi extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-peg-mutasi',[
            'pegawaiMutasis' => Mutasi::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
