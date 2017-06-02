<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DipaTahunAnggaran;

class TahunAnggaranController extends Controller
{
    //
    public function store(Request $request) 
    {
        $this->validate($request, [
	        'tahun'	    => 'required|min:4|max:4',
    	]);

        DipaTahunAnggaran::create([
            'dipa_tahun' => $request->tahun,
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
            'dipa_tahun' => $request->tahun,
        ]);

        return response()->json(['status','success'],200);
    }

    public function setAktif($id)
    {
        $tahun = DipaTahunAnggaran::find($id);
        if ($tahun == null) return abort(503);

        DipaTahunAnggaran::update([
            'dipa_statusTA' => '0',
        ]);

        DipaTahunAnggaran::find($id)->update([
            'dipa_statusTA' => '1',
        ]);

        return response()->json(['status','success'],200);
    }
}
