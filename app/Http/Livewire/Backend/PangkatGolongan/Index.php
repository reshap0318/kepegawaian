<?php

namespace App\Http\Livewire\Backend\PangkatGolongan;

use Livewire\Component;
use App\Models\PangkatGolongan;

class Index extends Component
{
    public $pangkatGolongan;

    public function render()
    {
        return view('livewire.backend.pangkat-golongan.index',[
            'pangkatgolongans' => PangkatGolongan::all()
        ]);
    } 

    public function deleteModel(PangkatGolongan $pangkatGolongan)
    {
        $this->pangkatGolongan = $pangkatGolongan;
    }

    public function destroy()
    {
        if($this->pangkatGolongan){
            $this->pangkatGolongan->delete();
        }
    }
}
