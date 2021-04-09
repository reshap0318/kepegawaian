<?php

namespace App\Http\Controllers\Api;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Master\UnitResource;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $datas = Unit::all();
        if($request->page){
            $datas = Unit::paginate(5)->withQueryString();
        }
        return UnitResource::collection($datas);
    }

    public function show(Unit $unit)
    {
        return new UnitResource($unit);
    }
}
