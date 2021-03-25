<?php

namespace App\Http\Livewire\Frontend\Fungsional;

use App\Models\PegawaiFungsional;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.frontend.fungsional.index',[
            'pegawaiFungsionals' => PegawaiFungsional::where('pegawai_id', $this->user->id)->get()
        ]);
    }
}
