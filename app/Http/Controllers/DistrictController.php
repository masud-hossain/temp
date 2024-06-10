<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    function index() {
        $district = District::latest()->paginate(10);
        return view('pages.district.index',['districts' => $district]);
    }

//Create
    function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:districts,name',
        ]);
        District::create($data);
        return response()->json('Created');
    }

    //Update
    function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:districts,name,'.$id,
        ]);

        $district = District::findOrFail($id);
        $district->update($data);

        return response()->json('Updated');
    }

//Delete
    function delete(Request $request) {
        $id = $request->id;
        $data = District::findOrfail($id);
        $data->delete();
        return response()->json(['status' => 'success']);
    }

    //Pagination
    function pagination(Request $request) {
        $district = District::latest()->paginate(5);
        return view('pages.district.pagination',['districts' => $district])->render();
    }

    //Search

    function search(Request $request) {
        $districts = District::where('name','like','%'.$request->text.'%' )->orderBy('id','DESC')->paginate(10);
        if($districts->count() >= 1){
            return view('pages.district.pagination',['districts' => $districts])->render();
        }else{
            return response()->json(['status' => '404']);
        }

    }


} //class
