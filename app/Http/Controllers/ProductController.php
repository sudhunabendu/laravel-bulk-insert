<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        return view('products');
    }

    public function store(){

        Excel::Import(new ProductsImport, request()->file('import_products'));
        return redirect()->back();
    }
}
