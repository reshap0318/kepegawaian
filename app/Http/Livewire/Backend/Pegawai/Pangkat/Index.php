<?php

namespace App\Http\Livewire\Backend\Pegawai\Pangkat;

use Livewire\Component;
use App\Models\{PegawaiPangkat, User};
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;
    
    public $user, $pegawaiPangkat;

    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);

        $this->user = $user;

    }

    public function render() 
    {
        return view('livewire.backend.pegawai.pangkat.index',[
            'pegawaiPangkats' => PegawaiPangkat::where('pegawai_id', $this->user->id)->get()
        ]);
    }

    public function changeStatusModel(PegawaiPangkat $pegawaiPangkat)
    {
        $this->pegawaiPangkat = $pegawaiPangkat;
    }

    public function changeStatus()
    {
        $this->pegawaiPangkat->updated_by = Auth()->user()->id;
        $this->pegawaiPangkat->status = $this->pegawaiPangkat->status ? false : true;
        $this->pegawaiPangkat->update();
    }

    public function deleteModel(PegawaiPangkat $pegawaiPangkat)
    {
        $this->pegawaiPangkat = $pegawaiPangkat;
    }

    public function destroy()
    {
        if($this->pegawaiPangkat){
            $this->pegawaiPangkat->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
