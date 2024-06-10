<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    function index() {
        return view('pages.info.index');
    }

    function show() {
        $info = Info::first();
        return response()->json($info);
    }


    function update(Request $request){

       $info = $request->validate([
            'name' => 'required',
            'propiter' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required'
        ]);

        $infomodel = Info::findOrFail(1);
        $infomodel->update($info);

        return response()->json('success');

    }
} //class
