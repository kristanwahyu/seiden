<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function show()
    {
        $job = User::withTrashed()->with('satuanKerja')
                    ->select('dipa_id_pengguna','username','dipa_nama_pengguna',
                        'dipa_id_satuan_kerja','dipa_pengguna_status', 'dipa_jenis_pengguna');
        return $this->makeDataTable($job);
    }

    public function makeDataTable($data)
    {
        return Datatables::eloquent($data)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
	        'username'	=> 'required|min:3',
	        'nama_user'	=> 'required|min:3',
            'password'  => 'required|min:8',
            'status'    => 'required',
            'jenis'     => 'required',
    	]);

        $password = bcrypt($request->password);

        User::create([
            'username'                => $request->username,
            'dipa_nama_pengguna'      => $request->nama_user,
            'dipa_password_pengguna'  => $password,
            'dipa_pengguna_status'    => $request->status,
            'dipa_jenis_pengguna'     => $request->jenis,
            'dipa_id_satuan_kerja'    => $request->satker_user,
        ]);

        if($request->status == 0){
            User::where('username',$request->username)->delete();
        }

        return response()->json(["status"=>"success"],200);
    }

    public function getOne($id)
    {
        return User::withTrashed()->with('satuanKerja')->find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
	        'username'	=> 'required|min:3',
	        'nama_user'	=> 'required|min:3',
            'status'    => 'required',
            'jenis'     => 'required',
    	]);
        User::withTrashed()->find($id)->update([
            'username'                => $request->username,
            'dipa_nama_pengguna'      => $request->nama_user,
            'dipa_pengguna_status'    => $request->status,
            'dipa_jenis_pengguna'     => $request->jenis,
            'dipa_id_satuan_kerja'    => $request->satker_user
        ]); 

        if($request->status == 0){
            $this->block($id);
        }
        else{
            User::withTrashed()->where('dipa_id_pengguna', $id)->restore();
            
        }

        return response()->json(["status"=>"success"],200);
    }

    public function block($id) {
        User::find($id)->delete();
        return response()->json(["status"=>"success"],200);
    }

    public function delete($id) {
        User::withTrashed()->where('dipa_id_pengguna', $id)->forceDelete();
        return response()->json(["status"=>"success"],200);
    }
}
