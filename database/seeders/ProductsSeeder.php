<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name" => "Свинной ошеек",     "category_id" => "1", "is_active" => 1],
            ["name" => "Вырезка",           "category_id" => "1", "is_active" => 0],
            ["name" => "Бычки",             "category_id" => "2", "is_active" => 1],
            ["name" => "Пиленгас",          "category_id" => "2", "is_active" => 1],
            ["name" => "Фанта",             "category_id" => "3", "is_active" => 1],
            ["name" => "Спрайт",            "category_id" => "3", "is_active" => 0],
            ["name" => "Водка",             "category_id" => "4", "is_active" => 0],
            ["name" => "Пиво",              "category_id" => "4", "is_active" => 1],
            ["name" => "Жевательная",       "category_id" => "5", "is_active" => 0],
            ["name" => "Тягучая",           "category_id" => "5", "is_active" => 1],
            ["name" => "Бисквитный",        "category_id" => "6", "is_active" => 0],
            ["name" => "Шоколадный",        "category_id" => "6", "is_active" => 1],
            ["name" => "Эклер",             "category_id" => "7", "is_active" => 1],
            ["name" => "Дамские пальчики",  "category_id" => "7", "is_active" => 1],
        ];

        foreach ($data as $item){
            $product = new Product();
            $product->name = $item['name'];
            $product->category_id = $item['category_id'];
            $product->save();
        }
    }
}
