<?php

namespace App\Http\Livewire\Frontend\Mutasi;

use Livewire\Component;
use App\Models\{Mutasi};
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user;
    
    public function mount()
    {
        $this->user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.frontend.mutasi.index', [
            'pegawaiMutasis' => Mutasi::where('pegawai_id',Auth::id())->get()
        ]);
    }
}
