<?php

namespace App\Http\Livewire\Backend\Pegawai;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.show');
    }
}
