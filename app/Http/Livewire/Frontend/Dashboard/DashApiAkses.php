<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use App\Models\ApiAkses;
use Illuminate\Support\Facades\Auth;

class DashApiAkses extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-api-akses',[
            'apiAksess' => ApiAkses::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
