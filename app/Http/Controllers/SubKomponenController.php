<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaKomponen;
use App\Model\DipaSubKomponen;

class SubKomponenController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaKomponen::with(array('subOutput' => function($m){
                $m->with(array('output' => function($o){
                    $o->with(array('kegiatan' => function($q){
                        $q->with(array('program' =>function ($p){
                            $p->with('tahun','satuanKerja');
                        }));
                    }));
                }));
            }))
            ->where('dipa_id_komponen',$id)->first();
        // return $data;
        return view('pages.satker.dipa_subkomponen',$data);
    }

    public function show($id_komponen)
    {
        $job = DipaSubKomponen::with('akun')->where('dipa_id_komponen',$id_komponen)->orderBy('dipa_id_sub_komponen', 'desc');

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_komponen'      => 'required',
            'kode_sub_komponen' => 'required',
            'nama_sub_komponen'  => 'required',
    	]);

        DipaSubKomponen::create([
            'dipa_kode_sub_komponen'      => $request->kode_sub_komponen,
            'dipa_nama_sub_komponen'      => $request->nama_sub_komponen,
            'dipa_id_komponen' => $request->id_komponen,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_sub_komponen' => 'required',
            'nama_sub_komponen'  => 'required',
    	]);
        $output = DipaSubKomponen::where('dipa_id_sub_komponen',$id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_sub_komponen'      => $request->kode_sub_komponen,
            'dipa_nama_sub_komponen'      => $request->nama_sub_komponen,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaSubKomponen::where('dipa_id_sub_komponen',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaSubKomponen::where('dipa_id_sub_komponen', $id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
