<?php

namespace App\Http\Livewire\Backend\Pegawai;

use App\Models\{Pegawai, User};
use Illuminate\Support\Facades\Auth;
use Livewire\{Component,WithPagination};

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
        $myunit = Auth::user()->pegawai->myUnits();
        $pegawais = Pegawai::with('unit')->whereIn("unit_id", $myunit);
        if(Auth::user()->can('pegawai_list')){
            $pegawais = Pegawai::with('unit');
        }
        return view('livewire.backend.pegawai.index',[
            'pegawais' => $pegawais->where(function($query)
            {
                $query->where('nip','like','%'.$this->search.'%')->orWhere('nama','like','%'.$this->search.'%');
            })->orderby('unit_id','asc')->paginate(25)
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
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
