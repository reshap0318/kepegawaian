<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use App\Models\Fungsional;
use Illuminate\Support\Facades\Auth;

class DashFungsional extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-fungsional',[
            'fungsionals' => Fungsional::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
