<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApiProductController extends Controller
{
    public function dataTable(Request $request) {
        //1) Gather variables
        $productName = $request->product_name;
        $productCategoryId = $request->product_category_id;
        $isActive = $request->is_active;
        $toSearch = $request->search;


        //2) Prepare model query
        $products = Product::select(
            "products.name as product_name",
            "products.category_id as category_id",
            "products.is_active as is_active",
            "pc.name as product_category_name"
        )
            ->join('product_categories as pc', 'products.category_id', '=', 'pc.id');


        //3) Apply searching
        if($toSearch == 1){
            if ($productName){
                $products->where("products.name", "LIKE", "%".$productName."%");
            }

            if ($productCategoryId){
                $products->where("category_id", $productCategoryId);
            }

            if ($isActive) {
                $products->where("is_active", $isActive);
            }
        }


        //4) Build Datatable
        $generatedTable = Datatables
            ::of($products)
            ->addIndexColumn()
            ->addColumn("is_active" , function ($row){
                return $row->is_active ? "Да" : "Нет";
            })
            ->orderColumn("is_active", function ($query, $order) {
                $query->orderBy("is_active", $order);
            })
            ->orderColumn("product_name", function ($query, $order) {
                $query->orderBy("product_name", $order);
            })
            ->make();

        return $generatedTable;
    }
}
