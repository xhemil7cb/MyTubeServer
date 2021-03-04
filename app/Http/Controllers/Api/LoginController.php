<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login (Request $request){

        $login = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if(!Auth::attempt($login)){
            return "Mut Gabim user ose pw";
        }

        return Auth::user()->createToken("AuthToken");


    }
}
