<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Model\DipaProgram;
use App\Model\DipaKegiatan;

class KegiatanController extends Controller
{
    public function showPage($id)
    {   
        $data = DipaProgram::with('tahun','satuanKerja')
            ->where('dipa_id_program',$id)->first();
        // return $data;
        return view('pages.satker.dipa_kegiatan',$data);
    }

    public function show($id_program)
    {
        $job = DipaKegiatan::with('output')->where('dipa_id_program',$id_program);

        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_program'      => 'required',
            'kode_kegiatan' => 'required',
            'nama_kegiatan'  => 'required',
    	]);

        DipaKegiatan::create([
            'dipa_kode_kegiatan'      => $request->kode_kegiatan,
            'dipa_nama_kegiatan'      => $request->nama_kegiatan,
            'dipa_id_program' => $request->id_program,
        ]);

        return response()->json(["status"=>"success"],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_kegiatan' => 'required',
            'nama_kegiatan'  => 'required',
    	]);
        $kegiatan = DipaKegiatan::find($id);
        if($kegiatan == null) return abort(503);

        $kegiatan->update([
            'dipa_kode_kegiatan'      => $request->kode_kegiatan,
            'dipa_nama_kegiatan'      => $request->nama_kegiatan,
        ]);

        return response()->json(["status"=>"success"],200);
    }
    public function getOne($id)
    {
        return DipaKegiatan::where('dipa_id_kegiatan',$id)->first();
    }

    public function delete($id)
    {
        $kegiatan = DipaKegiatan::find($id);
        if($kegiatan == null) return abort(503);
        $kegiatan->delete();
    }
}
