<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class DashUnit extends Component
{
    public function render()
    { 
        return view('livewire.frontend.dashboard.dash-unit',[
            'units' => Unit::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
