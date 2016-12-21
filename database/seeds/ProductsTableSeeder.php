<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->delete();
        $productData = [["name" => "Clock", "description" => "Solid wood clock",
            "price" => "2000"],
                        ["name" => "Sony Experia M5 dual", "description" => "Discover the power to take videos in outstanding 4K, and capture every moment as you see it",
            "price" => "32000"],
                        ["name" => "Playstation", "description" => "Playstation 4 with more graphics",
            "price" => "4500"]];
        foreach ($productData as $data) {
            DB::table('products')->insert([
                'name'       => $data['name'],
                'description'      => $data['description'],
                'price'   => $data['price'],
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ]);
        }
    }
}
