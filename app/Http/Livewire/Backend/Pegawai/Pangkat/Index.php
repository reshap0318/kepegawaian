<?php

namespace App\Http\Livewire\Backend\Pegawai\Pangkat;

use Livewire\Component;
use App\Models\{PegawaiPangkat, User};
use App\Notifications\userNotification;
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

        $data = [
            'pesan' => $this->pegawaiPangkat->status ? 'Pengajuan Riwayat Pangkat Anda Telah disetujui Oleh Admin' : 'Pengajuan Riwayat Pangkat Anda Tidak disetujui Oleh Admin',
            'link' => $this->user->hasAnyRole(1, 2) ? route('pegawai.show', $this->user) : route('frontend.pegawai.index')
        ];
        $this->user->notify(new userNotification($data));
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
