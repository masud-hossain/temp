<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function index() {
        return view('pages.profile.index');
    }

    function show() {
        $user = Auth::user();
        return response()->json($user);
    }

    function update(Request $request){
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'required'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            if(Hash::check($request->password, $user->password)){
                $user->password = Hash::make($request->newpassword);
            }else{
                return;
            }

        }
        $user->save();
        return response()->json('success');

    }

} //class
