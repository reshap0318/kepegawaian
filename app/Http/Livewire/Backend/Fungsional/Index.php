<?php

namespace App\Http\Livewire\Backend\Fungsional;

use App\Models\Fungsional;
use Livewire\Component;

class Index extends Component
{
    public $fungsional;

    public function render()
    {
        return view('livewire.backend.fungsional.index',[
            'fungsionals' => Fungsional::all()
        ]);
    }

    public function deleteModel(Fungsional $fungsional)
    {
        $this->fungsional = $fungsional;
    }

    public function destroy()
    {
        if($this->fungsional){
            $this->fungsional->delete();
        }
    }
}
