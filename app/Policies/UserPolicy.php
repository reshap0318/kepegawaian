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
        return $user->pegawai->unit_id === $other->pegawai->unit_id;
    }
}
