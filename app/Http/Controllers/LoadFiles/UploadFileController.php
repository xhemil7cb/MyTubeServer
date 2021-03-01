<?php

namespace App\Http\Controllers\LoadFiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Music;
use Illuminate\Support\Facades\Auth;


class UploadFileController extends Controller
{
    public function get()
    {       
        return view('upload');
    }

    public function upload(Request $request){

        request()->validate([
            'file' => 'required',
            'file.*' => 'mimes:mp4,mp3'
        ]);



        foreach($request->file('file') as $file)
        {

            //dd($file->getClientOriginalName());
            $filename = Str::random(8).'.'.$file->extension();;       
            $file->move(public_path('MyUploads'), $filename);

            $music = new Music([
              'original_name' => $file->getClientOriginalName(),
              'name_on_server'=> $filename,
              'user_id' => Auth::id(),
            ]);

            $music->save();

        }
       // dd($timestamps);

        return $this->get();
    }

}
