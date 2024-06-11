<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Rakibhstu\Banglanumber\NumberToBangla;

class ProductController extends Controller
{
    function index() {
        $numto = new NumberToBangla();
        $products = Product::latest()->paginate(10);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('pages.product.index',['suppliers' => $suppliers, 'categories' => $categories, 'products' => $products,'numto'=> $numto]);
    }
}
