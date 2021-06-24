<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $totalNotify = 0;
    public $notifys = [];

    protected $listeners = ['fetchNotify'];

    public function fetchNotify()
    {
        $this->totalNotify = Auth::user()->unreadNotifications->count();
        $this->notifys = Auth::user()->notifications;
    }

    public function markRead($id, $link=null)
    {
        Auth::user()->unreadNotifications->map(function($n) use($id) {
            if($n->id == $id){
                $n->markAsRead();
            }
        });
        $this->fetchNotify();
        return redirect($link);
    }

    public function render()
    {
        $this->fetchNotify();
        return view('livewire.frontend.notification');
    }
}
