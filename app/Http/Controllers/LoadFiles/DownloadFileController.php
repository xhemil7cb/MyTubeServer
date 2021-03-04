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

        return $musics =Auth::user()->musics;

    }


    public function download($filename){

        $pathtofile = "MyUploads/".$filename;
        $user = Auth::user();
        $originalfilename =  $user->musics()->where('name_on_server', $filename)->value('original_name');

        return response()->download($pathtofile,$originalfilename);
      
    }

    public function apidownload(){

        return response()->json("AHshahahahhahahahahahahhahahaha .I..", 69);
    }

}
