<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class DashPermission extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-permission',[
            'permissions' => Permission::whereIn('id',Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
