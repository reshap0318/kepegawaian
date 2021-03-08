<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class GantiPassword extends Component
{
    public  $user, $old_password, $new_password, $confirm_password;

    public function mount()
    {
        $this->user =app('auth')->user();
    }

    public function render()
    {
        return view('backend.user.ganti-password');
    }

    public function update()
    {
        $this->validate([
            'old_password'          => 'required|string',
            'new_password'          => 'required|string|min:8',
            'confirm_password'      => 'required|string|min:8|same:new_password',
        ]);
        $password = $this->old_password;
        if($this->user){
            $userPass = $this->user ? $this->user->password : null;
            if(Hash::check($password, $userPass)){
                $this->user->password = Hash::make($this->new_password);
                $this->user->update();
                return redirect('dashboard');
            }else{
                $this->addError('old_password', 'This Password Not Matching With Old Password');
            }
        }

    }
}
