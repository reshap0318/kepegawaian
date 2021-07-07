<?php

namespace App\Http\Livewire\Frontend\Dashboard;

use Livewire\Component;
use App\Models\PegawaiFungsional;
use Illuminate\Support\Facades\Auth;

class DashPegFungsional extends Component
{
    public function render()
    {
        return view('livewire.frontend.dashboard.dash-peg-fungsional',[
            'pegawaiFungsionals' => PegawaiFungsional::whereIn('id' , Auth::user()->pegawai->myUnits())->count('id')
        ]);
    }
}
