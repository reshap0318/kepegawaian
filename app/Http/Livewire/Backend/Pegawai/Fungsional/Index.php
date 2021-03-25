<?php

namespace App\Http\Livewire\Backend\Pegawai\Fungsional;

use App\Models\User;
use App\Models\PegawaiFungsional;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;

    public $user, $pegawaiFungsional;

    public function mount(User $user,PegawaiFungsional $pegawaiFungsional)
    {
        $this->authorize('viewPegawai',$user);

        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.fungsional.index',[
            'pegawaiFungsionals' => PegawaiFungsional::where('pegawai_id', $this->user->id)->get()
        ]);
    }

    public function changeStatus(PegawaiFungsional $pegawaiFungsional)
    {
        $pegawaiFungsional->status = $pegawaiFungsional->status ? false : true;
        $pegawaiFungsional->update();
    }

    public function deleteModel(PegawaiFungsional $pegawaiFungsional)
    {
        $this->pegawaiFungsional = $pegawaiFungsional;
    }

    public function destroy()
    {
        if($this->pegawaiFungsional){
            $this->pegawaiFungsional->delete();
        }
    }
}
