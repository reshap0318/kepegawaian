<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $totalNotify = 0;
    public $notifys = [];
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    protected $listeners = ['fetchNotify'];

    public function fetchNotify()
    {
        $this->totalNotify =  $this->user->unreadNotifications->count();
        $this->notifys =  $this->user->notifications;
    }

    public function markRead($id, $user_id=null)
    {
         $this->user->unreadNotifications->map(function($n) use($id) {
            if($n->id == $id){
                $n->markAsRead();
            }
        });
        $this->fetchNotify();
        $link = $this->user->hasAnyRole(1, 2) ? route('pegawai.show', $user_id) : route('frontend.pegawai.index');
        return redirect($link);
    }

    public function render()
    {
        $this->fetchNotify();
        return view('livewire.frontend.notification');
    }
}
