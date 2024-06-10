<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Index
    function index() {
        return view('pages.login.index');
    } //Index


    //Login
    function login(Request $request) {
        //Validate
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Login
        if(Auth::attempt($user)){
            return response()->json('success');
        }

    } //login


    //Logout
    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return 'Yes';
    } //Logout


} //Class

