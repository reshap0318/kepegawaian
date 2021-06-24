<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Dashboard extends Component
{

    // //su-admin
    // public $totRole = 0, $totPermission = 0;
    // //admin
    // public $totUnit = 0, $totFungsional = 0, $totPangGol = 0, $totJabUnit = 0;
    // public $totPegawai = 0;
    // //pegawai
    // public $totPegMutasi = 0, $pegFungsional = "", $pegPangGol = "", $pegJabatan = "", $pegUnit = ""; 
    // public $pegawai;

    public function render()
    {
        return view('livewire.frontend.dashboard');
    }
}
