<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ModifUserController extends Controller
{
    public function index()
    {
        return view('modifUser');
    }

    public function edit(Request $request)
    {
        $user = Auth::User();
        
        $modif = \App\User::find($user->id);
        //$pass = Hash::make($request->input('newPassword'));
        if($request->input('newEmail') != null && $request->input('newPassword') == null){
            $modif->email = $request->input('newEmail');
        }
        elseif($request->input('newPassword') != null && $request->input('newEmail') == null){
            $pass = Hash::make($request->input('newPassword'));
            $modif->password = $pass;
        }
        elseif($request->input('newPassword') != null && $request->input('newEmail') != null){
            $modif->email = $request->input('newEmail');
            $pass = Hash::make($request->input('newPassword'));
            $modif->password = $pass;
        }
        else{
            return redirect()->route('viewModif');
        }
        $modif->save();

        return redirect()->route('viewModif');
    }
}
