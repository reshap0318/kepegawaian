<?php

namespace App\Http\Livewire\Frontend\Pangkat;

use Livewire\Component;
use App\Models\PegawaiPangkat;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user, $pegawaiPangkat;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.pangkat.index',[
            'pegawaiPangkats' => PegawaiPangkat::where('pegawai_id', Auth::id())->get()
        ]);
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
