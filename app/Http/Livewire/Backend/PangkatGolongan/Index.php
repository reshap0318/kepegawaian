<?php

namespace App\Http\Livewire\Backend\PangkatGolongan;

use Livewire\{Component,WithPagination};
use App\Models\PangkatGolongan;

class Index extends Component
{
    use WithPagination;

    public $pangkatGolongan, $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.backend.pangkat-golongan.index',[
            'pangkatGolongans' => PangkatGolongan::where('nama','like','%'.$this->search.'%')->orWhere('golongan','like','%'.$this->search.'%')->orderby('golongan','asc')->paginate(5)
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
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
