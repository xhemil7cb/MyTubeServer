<?php

namespace App\Http\Controllers\LoadFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DownloadFileController extends Controller
{
    //
   
    public function get(){ 


        $user = Auth::user();
        $musics = $user->musics()->paginate(3);
        return $musics;

 /*
        $musics = DB::table('musics')->Paginate(3);
        return view('download', ['musics' => $musics] );
*/

    }


    public function download($filename){

        $pathtofile = "MyUploads/".$filename;
        $user = Auth::user();
        $originalfilename =  $user->musics()->where('name_on_server', $filename)->value('original_name');

        return response()->download($pathtofile,$originalfilename);
      
    }

}
