<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaKomponen;
use App\Model\DipaSubOutput;

class KomponenController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaSubOutput::with(array('output' => function($o){
                $o->with(array('kegiatan' => function($q){
                    $q->with(array('program' =>function ($p){
                        $p->with('tahun','satuanKerja');
                    }));
                }));
            }))
            ->where('dipa_id_sub_output',$id)->first();
        // return $data;
        return view('pages.satker.dipa_komponen',$data);
    }

    public function show($id_sub_output)
    {
        $job = DipaKomponen::with('subKomponen')->where('dipa_id_sub_output',$id_sub_output);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_sub_output'      => 'required',
            'kode_komponen' => 'required',
            'nama_komponen'  => 'required',
    	]);

        DipaKomponen::create([
            'dipa_kode_komponen'      => $request->kode_komponen,
            'dipa_nama_komponen'      => $request->nama_komponen,
            'dipa_id_sub_output' => $request->id_sub_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_komponen' => 'required',
            'nama_komponen'  => 'required',
    	]);
        $output = DipaKomponen::find($id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_komponen'      => $request->kode_komponen,
            'dipa_nama_komponen'      => $request->nama_komponen,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaKomponen::where('dipa_id_komponen',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaKomponen::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
