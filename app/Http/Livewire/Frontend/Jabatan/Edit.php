<?php

namespace App\Http\Livewire\Frontend\Jabatan;

use Illuminate\Support\Facades\{Auth, Notification};
use App\Notifications\userNotification;
use Livewire\{Component, WithFileUploads};
use App\Models\{JabatanUnit, PegawaiJabatan, User};

class Edit extends Component
{
    use WithFileUploads;

    public $pegawaiJabatan, $user;
    public $jabatan, $tanggal_mulai, $tanggal_selesai, $file_sk;
  
    public function mount(PegawaiJabatan $pegawaiJabatan)
    {        
        $this->pegawaiJabatan = $pegawaiJabatan;
        $this->jabatan = $pegawaiJabatan->jabatan_id;
        $this->tanggal_mulai = $pegawaiJabatan->tgl_mulai;
        $this->tanggal_selesai = $pegawaiJabatan->tgl_selesai;

        
        $this->user =Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.jabatan.edit',[
            'jabatanUnits' => JabatanUnit::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'jabatan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]);
            $fileName = explode("/",$this->pegawaiJabatan->file_sk)[1];
            $this->pegawaiJabatan->update([
                'file_sk'  => $this->file_sk->storeAs('sk_jabatan', $fileName,'public')
            ]);
        }

        $this->pegawaiJabatan->update([
            'jabatan_id' => $this->jabatan,
            'tgl_mulai' => $this->tanggal_mulai,
            'tgl_selesai' => $this->tanggal_selesai,
            'status' => 0,
            'updated_by' =>Auth()->user()->id
        ]);
        $data = [
            'pesan' => 'User '.$this->user->pegawai->nama.' Melakukan Perubahan Riwayat Jabatan',
            'link' => route('pegawai.show', $this->user)
        ];
        $adminUnit = User::adminUnit($this->user->pegawai->myParent())->get();
        Notification::send($adminUnit, new userNotification($data));
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('frontend.pegawai.index');
    }
}