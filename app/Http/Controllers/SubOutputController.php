<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaOutput;
use App\Model\DipaSubOutput;

class SubOutputController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaOutput::with(array('kegiatan' => function($q){
               $q->with(array('program' =>function ($p){
                    $p->with('tahun','satuanKerja');
               }));
            }))
            ->where('dipa_id_output',$id)->first();
        // return $data;
        return view('pages.satker.dipa_suboutput',$data);
    }

    public function show($id_output)
    {
        $job = DipaSubOutput::with('komponen')->where('dipa_id_output',$id_output);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_output'      => 'required',
            'kode_sub_output' => 'required',
            'nama_sub_output'  => 'required',
    	]);

        DipaSubOutput::create([
            'dipa_kode_sub_output'      => $request->kode_sub_output,
            'dipa_nama_sub_output'      => $request->nama_sub_output,
            'dipa_id_output' => $request->id_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_sub_output' => 'required',
            'nama_sub_output'  => 'required',
    	]);
        $output = DipaSubOutput::find($id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_sub_output'      => $request->kode_sub_output,
            'dipa_nama_sub_output'      => $request->nama_sub_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaSubOutput::where('dipa_id_sub_output',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaSubOutput::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
