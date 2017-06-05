<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaKegiatan;
use App\Model\DipaOutput;

class OutputController extends Controller
{
    //
    public function showPage($id)
    {   
        $data = DipaKegiatan::with(array('program' => function($q){
               $q->with('tahun','satuanKerja'); 
            }))
            ->where('dipa_id_kegiatan',$id)->first();
        // return $data;
        return view('pages.satker.dipa_output',$data);
    }

    public function show($id_kegiatan)
    {
        $job = DipaOutput::with('subOutput')->where('dipa_id_kegiatan',$id_kegiatan);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kegiatan'      => 'required',
            'kode_output' => 'required',
            'nama_output'  => 'required',
    	]);

        DipaOutput::create([
            'dipa_kode_output'      => $request->kode_output,
            'dipa_nama_output'      => $request->nama_output,
            'dipa_id_kegiatan' => $request->id_kegiatan,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_output' => 'required',
            'nama_output'  => 'required',
    	]);
        $output = DipaOutput::find($id);
        if($output == null) return abort(503);

        $output->update([
            'dipa_kode_output'      => $request->kode_output,
            'dipa_nama_output'      => $request->nama_output,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaOutput::where('dipa_id_output',$id)->first();
    }

    public function delete($id)
    {
        $output = DipaOutput::find($id);
        if($output == null) return abort(503);
        $output->delete();
    }
}
