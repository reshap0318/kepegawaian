<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use App\Models\PangkatGolongan;
use Illuminate\Support\Facades\Auth;

class DashPangkatGolongan extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-pangkat-golongan',[
            'pangkatGolongans' => PangkatGolongan::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
