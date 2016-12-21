<?php

use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('productimages')->delete();
        $productData = [["product_id" => 1, "image" => "images/wood-clock.jpg"],
                        ["product_id" => 2, "image" => "images/sony-xperia-m5-dual.jpeg"],
                        ["product_id" => 3, "image" => "images/playstation.jpg"]];
        foreach ($productData as $data) {
            DB::table('productimages')->insert([
                'product_id'       => $data['product_id'],
                'image'      => $data['image'],
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ]);
        }
    }
}
