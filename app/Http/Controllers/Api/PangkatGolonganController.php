<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Master\PangkatGolonganResource;
use App\Models\PangkatGolongan;
use Illuminate\Http\Request;

class PangkatGolonganController extends Controller
{
    public function index(Request $request)
    {
        $datas = PangkatGolongan::all();
        if($request->page){
            $datas = PangkatGolongan::paginate(5)->withQueryString();
        }
        return PangkatGolonganResource::collection($datas);
    }

    public function show(PangkatGolongan $pangkatGolongan)
    {
        return response()->json([
            'data' => $pangkatGolongan
        ]);
    }
}
