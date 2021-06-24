<?php

namespace App\Http\Livewire\Backend\Pegawai\Fungsional;

use App\Models\User;
use Livewire\Component;
use App\Models\PegawaiFungsional;
use App\Notifications\userNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;

    public $user, $pegawaiFungsional;

    public function mount(User $user)
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
    public function changeStatusModel(PegawaiFungsional $pegawaiFungsional)
    {
        $this->pegawaiFungsional = $pegawaiFungsional;
    }

    public function changeStatus()
    {
        $this->pegawaiFungsional->updated_by = Auth()->user()->id;
        $this->pegawaiFungsional->status = $this->pegawaiFungsional->status ? false : true;
        $this->pegawaiFungsional->update();

        $data = [
            'pesan' => $this->pegawaiFungsional->status ? 'Pengajuan Riwayat Fungsional Anda Telah disetujui Oleh Admin' : 'Pengajuan Riwayat Fungsional Anda Tidak disetujui Oleh Admin',
            'link' => $this->user->hasAnyRole(1, 2) ? route('pegawai.show', $this->user) : route('frontend.pegawai.index')
        ];
        $this->user->notify(new userNotification($data));
    }

    public function deleteModel(PegawaiFungsional $pegawaiFungsional)
    {
        $this->pegawaiFungsional = $pegawaiFungsional;
    }

    public function destroy()
    {
        if($this->pegawaiFungsional){
            $this->pegawaiFungsional->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'title' => 'Successfully Deleted!', 'message' => '']);
        }
    }
}
