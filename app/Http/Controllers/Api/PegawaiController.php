<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Api\Pegawai\{
    ListResource as PegawaiListCollection,
    DetailResource as PegawaiDetailCollection,
    Jabatan\ListResource as JabatanListCollection,
    Jabatan\DetailResource as JabatanDetailCollection,
    Fungsional\ListResource as FungsionalListCollection,
    Fungsional\DetailResource as FungsionalDetailCollection,
    Pangkat\ListResource as PangkatListCollection,
    Pangkat\DetailResource as PangkatDetailCollection,
    Mutasi\ListResource as MutasiListCollection,
    Mutasi\DetailResource as MutasiDetailCollection,
};

use App\Models\{
    Pegawai,
    PegawaiFungsional,
    PegawaiJabatan,
    PegawaiPangkat,
    Mutasi
};

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $datas = Pegawai::all();
        if($request->page){
            $datas = Pegawai::paginate(5)->withQueryString();
        }
        return PegawaiListCollection::collection($datas);
    }

    public function show(Pegawai $pegawai)
    {
        return new PegawaiDetailCollection($pegawai);
    }

    public function jabatanIndex(Pegawai $pegawai, Request $request)
    {
        $datas =$pegawai->jabatans;
        if($request->page){
            $datas = $pegawai->jabatans()->paginate(5)->withQueryString();
        }
        return JabatanListCollection::collection($datas);
    }

    public function jabatanShow(Pegawai $pegawai, PegawaiJabatan $pegawaiJabatan)
    {
        if(!$pegawai->is($pegawaiJabatan->pegawai))
            abort(404);
        return new JabatanDetailCollection($pegawaiJabatan);
    }

    public function fungsionalIndex(Pegawai $pegawai, Request $request)
    {
        $datas =$pegawai->fungsionals;
        if($request->page){
            $datas = $pegawai->fungsionals()->paginate(5)->withQueryString();
        }
        return FungsionalListCollection::collection($datas);
    }

    public function fungsionalShow(Pegawai $pegawai, PegawaiFungsional $pegawaiFungsional)
    {
        if(!$pegawai->is($pegawaiFungsional->pegawai))
            abort(404);
        return new FungsionalDetailCollection($pegawaiFungsional);
    }

    public function pangkatIndex(Pegawai $pegawai, Request $request)
    {
        $datas =$pegawai->pangkats;
        if($request->page){
            $datas = $pegawai->pangkats()->paginate(5)->withQueryString();
        }
        return PangkatListCollection::collection($datas);
    }

    public function pangkatShow(Pegawai $pegawai, PegawaiPangkat $pegawaiPangkat)
    {
        if(!$pegawai->is($pegawaiPangkat->pegawai))
            abort(404);
        return new PangkatDetailCollection($pegawaiPangkat);
    }
    
    public function mutasiIndex(Pegawai $pegawai, Request $request)
    {
        $datas =$pegawai->mutasis;
        if($request->page){
            $datas = $pegawai->mutasis()->paginate(5)->withQueryString();
        }
        return MutasiListCollection::collection($datas);
    }

    public function mutasiShow(Pegawai $pegawai, Mutasi $mutasi)
    {
        if(!$pegawai->is($mutasi->pegawai))
            abort(404);
        return new MutasiDetailCollection($mutasi);
    }

}
