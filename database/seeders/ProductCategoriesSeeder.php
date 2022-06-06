<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ["name" => "Мясо"],
            ["name" => "Рыба"],
            ["name" => "Безалкогольные напитки"],
            ["name" => "Алкогольные напитки"],
            ["name" => "Карамель"],
            ["name" => "Торты"],
            ["name" => "Пироженные"]
        ];

        foreach ($data as $item){
            $productCategory = new ProductCategory();
            $productCategory->name = $item['name'];
            $productCategory->save();
        }
    }
}
