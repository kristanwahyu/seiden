<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Model\DipaPembayaranSyarat as syarat;

class SyaratPembayaranController extends Controller
{
    //
    public function download()
    {

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

    public function save($data, $id_pmb)
    {
        syarat::create([
            'dipa_syarat_1'         => $data[0][1],
            'dipa_dokumen_syarat_1' => $data[0][0],
            'dipa_syarat_2'         => $data[1][1],
            'dipa_dokumen_syarat_2' => $data[1][0],
            'dipa_syarat_3'         => $data[2][1],
            'dipa_dokumen_syarat_3' => $data[2][0],
            'dipa_syarat_4'         => $data[3][1],
            'dipa_dokumen_syarat_4' => $data[3][0],
            'dipa_syarat_5'         => $data[4][1],
            'dipa_dokumen_syarat_5' => $data[4][0],
            'dipa_syarat_6'         => $data[5][1],
            'dipa_dokumen_syarat_6' => $data[5][0],
            'dipa_syarat_7'         => $data[6][1],
            'dipa_dokumen_syarat_7' => $data[6][0],
            'dipa_pembayaran_id'    => $id_pmb,
        ]);
    }

}
