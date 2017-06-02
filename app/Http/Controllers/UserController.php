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
        $job = User::withTrashed()->select('dipa_idUser','username','dipa_namaUser','dipa_statusUser', 'dipa_jenisUser');
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
            'username'       => $request->username,
            'dipa_namaUser'  => $request->nama_user,
            'dipa_passUser'  => $password,
            'dipa_statusUser'=> $request->status,
            'dipa_jenisUser' => $request->jenis
        ]);

        if($request->status == 0){
            User::where('username',$request->username)->delete();
        }

        return response()->json(["status"=>"success"],200);
    }

    public function getOne($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
	        'username'	=> 'required|min:3',
	        'nama_user'	=> 'required|min:3',
            'status'    => 'required',
            'jenis'     => 'required',
    	]);

        User::find($id)->update([
            'username'       => $request->username,
            'dipa_namaUser'  => $request->nama_user,
            'dipa_statusUser'=> $request->status,
            'dipa_jenisUser' => $request->jenis
        ]); 

        if($request->status == 0){
            $this->block($id);
        }

        return response()->json(["status"=>"success"],200);
    }

    public function block($id) {
        User::find($id)->delete();
        return response()->json(["status"=>"success"],200);
    }

    public function delete($id) {
        User::find($id)->delete();
    }
}
