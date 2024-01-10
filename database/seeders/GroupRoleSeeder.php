<?php

namespace Database\Seeders;

use App\Models\GroupRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupRole::truncate();
        for($i = 1; $i <= 71; $i++){
            $item = new GroupRole();
            $item->role_id= $i;
            $item->group_id = 30;
            $item->timestamps = false;
            $item->save();
        }
    }
}
