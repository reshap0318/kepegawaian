<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashRole extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-role',[
            'roles' => Role::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
