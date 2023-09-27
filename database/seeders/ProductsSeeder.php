<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new Product();
        $item->nam = "Máy tính";
        $item->image = "múp";
        $item->description = "ahy";
        $item->price = 10;
        $item->quantity = 1;
        $item->status = 1;
        $item->category_id = 1;


        $item->save();

    }
}
