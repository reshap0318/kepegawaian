<?php

namespace App\Http\Livewire\Backend\Pegawai;

use Livewire\{Component,WithPagination};
use App\Models\{Pegawai, User};
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $user;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pegawais = Pegawai::with('unit')->where('unit_id',Auth::user()->pegawai->unit_id);
        if(Auth::user()->can('pegawai_list')){
            $pegawais = Pegawai::with('unit');
        }
        return view('livewire.backend.pegawai.index',[
            'pegawais' => $pegawais->where('nip','like','%'.$this->search.'%')->whereOr('nama','like','%'.$this->search.'%')->paginate(5)
        ]);
    }

    public function deleteModel(User $user)
    {
        $this->user = $user;
    }

    public function destroy()
    {
        if($this->user){
            $this->user->pegawai->delete();
            $this->user->delete();
        }
    }
}
