<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Master\FungsionalResource;
use App\Models\Fungsional;
use Illuminate\Http\Request;

class FungsionalController extends Controller
{
    public function index(Request $request)
    {
        $datas = Fungsional::all();
        if($request->page){
            $datas = Fungsional::paginate(5)->withQueryString();
        }
        return FungsionalResource::collection($datas);
    }

    public function show(Fungsional $fungsional)
    {
        return response()->json([
            'data' => [
                'id' => $fungsional->id,
                'nama' => $fungsional->nama,
                'grade' => $fungsional->grade,
                'created_at' => $fungsional->created_at,
                'updated_at' => $fungsional->updated_at,
            ]
        ]);
    }
}
