<?php

namespace App\Http\Livewire\Frontend\Mutasi;

use Livewire\Component;
use App\Models\{Mutasi};
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user, $mutasi;
    
    public function mount()
    {
        $this->user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.frontend.mutasi.index', [
            'pegawaiMutasis' => Mutasi::where('pegawai_id',Auth::id())->get()
        ]);
    }

    public function deleteModel(Mutasi $mutasi)
    {
        $this->mutasi = $mutasi;
    }

    public function destroy()
    {
        if($this->mutasi){
            $this->mutasi->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
