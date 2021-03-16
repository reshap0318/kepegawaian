<?php

namespace App\Http\Livewire\Backend\Pegawai;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public $users;

    public function render()
    {
        return view('livewire.backend.pegawai.index');
    }
}
