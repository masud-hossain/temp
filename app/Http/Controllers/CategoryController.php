<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::latest()->paginate(10);
        return view('pages.category.index',['categories' => $categories]);
    }

//Create
    function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'status' => 'required|boolean',
        ]);
        Category::create($data);
        return response()->json('Created');
    }

    //Update
    function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$id,
            'status' => 'required|boolean',
        ]);

        $categories = Category::findOrFail($id);
        $categories->update($data);

        return response()->json('Updated');
    }

//Delete
    function delete(Request $request) {
        $id = $request->id;
        $data = Category::findOrfail($id);
        $data->delete();
        return response()->json(['status' => 'success']);
    }

    //Pagination
    function pagination(Request $request) {
        $categories = Category::latest()->paginate(5);
        return view('pages.category.pagination',['categories' => $categories])->render();
    }

    //Search

    function search(Request $request) {
        $categories = Category::where('name','like','%'.$request->text.'%' )->orderBy('id','DESC')->paginate(10);
        if($categories->count() >= 1){
            return view('pages.category.pagination',['categories' => $categories])->render();
        }else{
            return response()->json(['status' => '404']);
        }

    }
}
