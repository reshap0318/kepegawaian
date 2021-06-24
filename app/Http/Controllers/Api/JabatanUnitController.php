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
        return response()->json([
            'id' => $jabatanUnit->id,
            'unit' => $jabatanUnit->unit->nama,
            'nama' => $jabatanUnit->nama,
            'grade' => $jabatanUnit->grade,
            'corporate_grade' => $jabatanUnit->corporate_grade,
            'parent' => [
                'id' => $jabatanUnit->parent->id,
                'nama' => $jabatanUnit->parent->nama,
                'unit' => $jabatanUnit->parent ? $jabatanUnit->parent->unit->nama : ""
            ],
            'created_at' => $jabatanUnit->created_at,
            'updated_at' => $jabatanUnit->updated_at,
        ]);
    }
}
