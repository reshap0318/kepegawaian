<?php

namespace App\Http\Livewire\Backend\Pegawai;

use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Show extends Component
{
    use AuthorizesRequests;
    public $user;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.show');
    }
}
