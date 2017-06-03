<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DipaTahunAnggaran;
use Yajra\Datatables\Facades\Datatables;

class TahunAnggaranController extends Controller
{
    public function store(Request $request) 
    {
        $this->validate($request, [
	        'tahun'	    => 'required|min:4|max:4',
    	]);

        DipaTahunAnggaran::create([
            'dipa_tahun_anggaran' => $request->tahun,
            'dipa_status' => '0'
        ]);

        return response()->json(['status'=>'success'],200);
    }

    public function getOne($id) 
    {
        return DipaTahunAnggaran::find($id);
    }

    public function update(Request $request, $id)
    {
        // validasi
        $this->validate($request, [
	        'tahun'	    => 'required|min:4|max:4',
    	]);
        $tahun = DipaTahunAnggaran::find($id);
        if ($tahun == null) return abort(503);
        // end validasi
        $tahun->update([
            'dipa_tahun_anggaran' => $request->tahun,
        ]);

        return response()->json(['status','success'],200);
    }

    public function aktifToggle(Request $request)
    {
        $tahun = DipaTahunAnggaran::find($request->id_tahun);
        if ($tahun == null) return abort(503);

        DipaTahunAnggaran::where('dipa_status', '1')->update([
            'dipa_status' => '0',
        ]);

        if($request->status == 1){
            DipaTahunAnggaran::find($request->id_tahun)->update([
                'dipa_status' => '1',
            ]);   
        }

        return response()->json(['status','success'],200);
    }

    public function show()
    {
        $tahun = DipaTahunAnggaran::select('*');
        return $this->makeDataTable($tahun);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }
}
