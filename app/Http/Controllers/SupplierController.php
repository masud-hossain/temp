<?php

namespace App\Http\Controllers;

use App\Models\Thana;
use App\Models\District;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    function index() {
        $suppliers = Supplier::latest()->paginate(10);
        $districts = District::all();
        return view('pages.supplier.index',['suppliers' => $suppliers, 'districts' => $districts]);
    }

    function showThana(Request $request) {
        $thanas = Thana::where('district_id',$request->id)->get();
        return response()->json($thanas);
    }


    //Create
    function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:thanas,name',
            'district_id' => 'required',
            'thana_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'balance' => 'nullable',
        ]);
        Supplier::create($data);
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

} //class
