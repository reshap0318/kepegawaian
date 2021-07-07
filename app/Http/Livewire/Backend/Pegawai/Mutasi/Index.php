<?php

namespace App\Http\Livewire\Backend\Pegawai\Mutasi;

use Livewire\Component;
use App\Models\{Mutasi, User};
use App\Notifications\userNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use AuthorizesRequests;

    public $user, $mutasi;
    
    public function mount(User $user)
    {
        $this->authorize('viewPegawai',$user);
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.backend.pegawai.mutasi.index', [
            'pegawaiMutasis' => Mutasi::where('pegawai_id',$this->user->id)->get()
        ]);
    }

    public function changeStatusModel(Mutasi $mutasi)
    {
        $this->mutasi = $mutasi;
    }

    public function changeStatus()
    {
        $this->mutasi->updated_by = Auth()->user()->id;
        $this->mutasi->status = $this->mutasi->status ? false : true;
        $this->mutasi->update();

        $data = [
            'pesan' => $this->mutasi->status ? 'Pengajuan Riwayat Mutasi Anda Telah disetujui Oleh Admin' : 'Pengajuan Riwayat Mutasi Anda Tidak disetujui Oleh Admin',
            'user_id' => $this->user->id
        ];
        $this->user->notify(new userNotification($data));
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
