<?php

namespace App\Http\Livewire\Backend\Fungsional;

use App\Models\Fungsional;
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;
    public $fungsional, $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.backend.fungsional.index',[
            'fungsionals' => Fungsional::where('nama','like','%'.$this->search.'%')->orWhere('grade','like','%'.$this->search.'%')->paginate(5)
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
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
