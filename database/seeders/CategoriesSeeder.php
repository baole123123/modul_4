<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new Category();
        $item->name = "Máy tính";
        $item->description = "hay";

        $item->save();
        $item = new Category();
        $item->name = "Điện thoại";
        $item->description = "dở";

        $item->save();
    }
}
