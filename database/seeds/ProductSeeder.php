<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                ["name"=>"Product 1", "price"=>300, "description"=>"Product 1 description"],
                ["name"=>"Product 2", "price"=>500, "description"=>"Product 2 description"],
                ["name"=>"Product 3", "price"=>800, "description"=>"Product 3 description"],
            ]);
    }
}
