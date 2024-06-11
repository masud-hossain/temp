<?php

namespace App\Http\Controllers;

use App\Models\Thana;
use App\Models\District;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Rakibhstu\Banglanumber\NumberToBangla;
class SupplierController extends Controller
{


    function index() {
        $numto = new NumberToBangla();
        $suppliers = Supplier::latest()->paginate(10);
        $districts = District::all();
        $thanas = Thana::all();
        return view('pages.supplier.index',['suppliers' => $suppliers, 'districts' => $districts, 'thanas' => $thanas,'numto'=> $numto]);
    }

    function showThana(Request $request) {
        $thanas = Thana::where('district_id',$request->id)->get();
        return response()->json($thanas);
    }

    // |unique:suppliers,name
    //Create
    function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'district_id' => 'required',
            'thana_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required|boolean',
        ]);

        Supplier::create($data);
        return response()->json('Created');
    }
// |unique:suppliers,name,'.$id
    //Update
    function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'district_id' => 'required',
            'thana_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'balance' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($data);
        return response()->json('Updated');

    }


    //Delete
    function delete(Request $request) {
        $id = $request->id;
        $data = Supplier::findOrfail($id);
        $data->delete();
        return response()->json(['status' => 'success']);
    }


    //Pagination
    function pagination(Request $request) {
        $suppliers = Supplier::latest()->paginate(10);
        return view('pages.supplier.pagination',['suppliers' => $suppliers])->render();
    }

    //Search

    function search(Request $request) {
        $suppliers = Supplier::where('name','like','%'.$request->text.'%' )->orderBy('id','DESC')->paginate(10);
        if($suppliers->count() >= 1){
            return view('pages.supplier.pagination',['suppliers' => $suppliers])->render();
        }else{
            return response()->json(['status' => '404']);
        }

    }


} //class
