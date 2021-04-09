<?php

namespace App\Http\Livewire\Backend\ApiAkses;

use App\Models\ApiAkses;
use Livewire\{Component, WithPagination};

class Index extends Component
{
    use WithPagination;
    public $apiAkses, $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    { 
        return view('livewire.backend.api-akses.index',[
            'apiAksess' => ApiAkses::where('nama','like','%'.$this->search.'%')->paginate(5)
        ]);
    }

    public function deleteModel(ApiAkses $apiAkses)
    {
        $this->apiAkses = $apiAkses;
    }

    public function destroy()
    {
        if($this->apiAkses){
            $this->apiAkses->delete();
        }
    }
}
