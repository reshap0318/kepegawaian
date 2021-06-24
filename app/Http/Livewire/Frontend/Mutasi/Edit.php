<?php

namespace App\Http\Livewire\Frontend\Mutasi;

use App\Models\{Mutasi, Unit, User};
use Illuminate\Support\Facades\{Auth, Notification};
use App\Notifications\userNotification;
use Livewire\{Component, WithFileUploads};

class Edit extends Component
{
    use WithFileUploads;

    public $user, $mutasi;
    public $unit, $tanggal_mutasi, $file_sk;

    public function mount(Mutasi $mutasi)
    {
        $this->user = Auth::user();
        $this->mutasi = $mutasi;
        $this->unit = $mutasi->unit_id;
        $this->tanggal_mutasi = $mutasi->tgl_mutasi;
    }

    public function render()
    {
        return view('livewire.frontend.mutasi.edit', [
            'units' => Unit::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'unit' => 'required',
            'tanggal_mutasi' => 'required',
        ]);

        if($this->file_sk){
            $this->validate([
                'file_sk' => 'file|mimes:pdf'
            ]);
            $fileName = explode("/",$this->mutasi->file_sk)[1];
            $this->mutasi->update([
                'file_sk'  => $this->file_sk->storeAs('sk_pangkat', $fileName,'public')
            ]);
        }

        $this->mutasi->update([
            'unit_id' => $this->unit,
            'tgl_mutasi' => $this->tanggal_mutasi,
            'status' => 0,
            'updated_by' => Auth()->user()->id
        ]);
        $data = [
            'pesan' => 'User '.$this->user->pegawai->nama.' Melakukan Perubahan Riwayat Mutasi',
            'link' => route('pegawai.show', $this->user)
        ];
        $adminUnit = User::adminUnit($this->user->pegawai->myParent())->get();
        Notification::send($adminUnit, new userNotification($data));
        session()->flash('success', 'Successfully updated!');
        return redirect()->route('frontend.pegawai.index');
    }
}
