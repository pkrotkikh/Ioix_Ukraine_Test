<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list() {
        $productCategories = ProductCategory::all();

        return view("products/list", [
            "productCategories" => $productCategories,
        ]);
    }
}
