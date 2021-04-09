<?php

namespace App\Policies;

use App\Models\{User};
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct() {
        
    }

    public function viewPegawai(User $user, User $other) 
    {
        if($user->can('pegawai_access')){
            return in_array($other->pegawai->unit_id, $user->pegawai->myUnits());
            return $user->pegawai->unit_id === $other->pegawai->unit_id;
        }
        return $user->id === $other->id;
    }
}
