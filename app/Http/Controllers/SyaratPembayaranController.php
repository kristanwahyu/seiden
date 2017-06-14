<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Model\DipaPembayaran;
use App\Model\DipaPembayaranSyarat as syarat;

class SyaratPembayaranController extends Controller
{
    //
    public function download($id_pmb, $url)
    {
        $pmb = DipaPembayaran::with('akunDetail')->where('dipa_pembayaran_id',$id_pmb)->first();
        $nama_detail = $pmb->akunDetail['dipa_nama_detail'];
        $nama_detail_arr = explode(' ', $nama_detail);
            if(count($nama_detail_arr) > 1) {
                $nama_detail = "";
                for($i=0; $i<count($nama_detail_arr); $i++)
                {
                    $nama_detail .= $nama_detail_arr[$i];
                }
            }
        $nama_folder = $pmb['dipa_id_detail_akun'].'_'.$nama_detail.'_'.$id_pmb;

        return response()->download(storage_path('app/public/'.$nama_folder.'/'.$url));
    }

    public function upload($file, $folder)
    {
        $filename = explode(' ', $file->getClientOriginalName());
        $a = "";
        if(count($filename) > 0) {
            for($i=0; $i<count($filename); $i++){
                $a .= $filename[$i];
            }
        } else {
            $a = $file->getClientOriginalName();
        }
        
        $name = time().$a;
        $path = storage_path('/app/public/'.$folder);
        if (!is_dir($path)){
            File::makeDirectory($path,0777,true);
        }
        
        $file->move($path, $name);

        return $name;
    }

    public function save($data, $data_check, $id_pmb)
    {   
        for($i=1; $i<8; $i++){
            if($data_check["check$i"] == null) $data_check["check$i"] = '0';
            if($data_check["check$i"] == '0') 
                $dokumen_syarat[$i] = null;
            else
                $dokumen_syarat[$i] = $data[$i-1][0]; 
        }
        syarat::create([
            'dipa_syarat_1'         => $data_check['check1'],
            'dipa_dokumen_syarat_1' => $dokumen_syarat[1],
            'dipa_syarat_2'         => $data_check['check2'],
            'dipa_dokumen_syarat_2' => $dokumen_syarat[2],
            'dipa_syarat_3'         => $data_check['check3'],
            'dipa_dokumen_syarat_3' => $dokumen_syarat[3],
            'dipa_syarat_4'         => $data_check['check4'],
            'dipa_dokumen_syarat_4' => $dokumen_syarat[4],
            'dipa_syarat_5'         => $data_check['check5'],
            'dipa_dokumen_syarat_5' => $dokumen_syarat[5],
            'dipa_syarat_6'         => $data_check['check6'],
            'dipa_dokumen_syarat_6' => $dokumen_syarat[6],
            'dipa_syarat_7'         => $data_check['check7'],
            'dipa_dokumen_syarat_7' => $dokumen_syarat[7],
            'dipa_pembayaran_id'    => $id_pmb,
        ]);
    }

    public function deleteDir($dir)
    {
        $path = storage_path('/app/public/'.$dir);
        if (!is_dir($path)){
            Storage::deleteDirectory($path);
        }
        return response()->json(['status'=>'success'],200);
    }

    public function delete($id_pmb)
    {
        $a = syarat::where('dipa_pembayaran_id', $id_pmb);
        if($a == null){
            return '0';
        } else {
            $a->delete();
            return '1';
        }

    }
}
