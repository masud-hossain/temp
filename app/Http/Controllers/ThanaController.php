<?php

namespace App\Http\Controllers;

use App\Models\Thana;
use App\Models\District;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    function index() {
        $thana = Thana::latest()->paginate(10);
        $districts = District::all();
        return view('pages.thana.index',['thanas' => $thana, 'districts' => $districts]);
    }

    //Create
    function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:thanas,name',
            'district_id' => 'required',
        ]);
        Thana::create($data);
        return response()->json('Created');
    }

    //Update
    function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:thanas,name,'.$id,
            'district_id' => 'required',
        ]);

        $thana = Thana::findOrFail($id);
        $thana->update($data);

        return response()->json('Updated');
    }


    //Delete
    function delete(Request $request) {
        $id = $request->id;
        $data = Thana::findOrfail($id);
        $data->delete();
        return response()->json(['status' => 'success']);
    }


    //Pagination
    function pagination(Request $request) {
        $thana = Thana::latest()->paginate(5);
        return view('pages.thana.pagination',['thanas' => $thana])->render();
    }

    //Search

    function search(Request $request) {
        $thanas = Thana::where('name','like','%'.$request->text.'%' )->orderBy('id','DESC')->paginate(10);
        if($thanas->count() >= 1){
            return view('pages.thana.pagination',['thanas' => $thanas])->render();
        }else{
            return response()->json(['status' => '404']);
        }

    }



} //Class
