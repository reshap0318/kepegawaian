<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    public function print(User $user)
    {
        $myunit = Auth::user()->pegawai->myUnits();
        $users = User::select('users.*')->join('pegawai','pegawai.id','=','users.id')->whereIn("unit_id", $myunit)->get();
        if(Auth::user()->can('pegawai_list')){
            $users = User::all();
        }
        if($user->id){
            $users = [$user];
        }
        // $users = User::where('id',4)->get();
        $pdf = PDF::loadView('livewire.backend.pegawai.print',['users'=> $users]);
        return $pdf->stream();
    }
}
