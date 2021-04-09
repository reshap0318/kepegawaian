<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Master\JabatanUnitResource;
use App\Models\JabatanUnit;
use Illuminate\Http\Request;

class JabatanUnitController extends Controller
{
    public function index(Request $request)
    {
        $datas = JabatanUnit::all();
        if($request->page){
            $datas = JabatanUnit::paginate(5)->withQueryString();
        }
        return JabatanUnitResource::collection($datas);
    }

    public function show(JabatanUnit $jabatanUnit)
    {
        return new JabatanUnitResource($jabatanUnit);
    }
}
