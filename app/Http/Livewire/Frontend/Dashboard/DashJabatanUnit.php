<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use App\Models\JabatanUnit;
use Illuminate\Support\Facades\Auth;

class DashJabatanUnit extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-jabatan-unit',[
            'jabatanUnits' => JabatanUnit::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
