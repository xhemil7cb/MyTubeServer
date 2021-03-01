<?php

namespace App\Http\Controllers\LoadFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadFileController extends Controller
{
    //
   
    public function get(){ 
        $user = Auth::user();
        $musics = $user->musics; 
        return view('download')->with('musics',$musics);
    }


    public function getUserMusics(){
        
    }

}
