<?php

namespace Database\Seeders;

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
            [
                'name' => 'LG Mobile',
                "price" => "200",
                "description" => "A Smart phone with 4GB RAM and Apple M1",
                "category" => "mobile",
                "gallery" => "https://www.slashgear.com/wp-content/uploads/2021/04/lg-eve-1280x720.jpg"
            ],
            [
                'name' => 'OnePlush 6t',
                "price" => "599",
                "description" => "A Smart phone with 4GB RAM and Apple M1",
                "category" => "mobile",
                "gallery" => "https://images-na.ssl-images-amazon.com/images/I/41nAzm2W09L._AC_.jpg"
            ],
            [
                'name' => 'Iphone 12',
                "price" => "889",
                "description" => "A Smart phone with 4GB RAM and Apple M1",
                "category" => "mobile",
                "gallery" => "https://cdn.tmobile.com/content/dam/t-mobile/en-p/cell-phones/apple/Apple-iPhone-12/Blue/Apple-iPhone-12-Blue-frontimage.png"
            ],
            [
                'name' => 'Samsung',
                "price" => "599",
                "description" => "A Smart phone with 4GB RAM and Apple M1",
                "category" => "mobile",
                "gallery" => "https://images.samsung.com/au/smartphones/galaxy-note20/buy/001-note20series-productimage-mo-720.jpg"
            ],
            [
                'name' => 'Nokia',
                "price" => "699",
                "description" => "A Smart phone with 4GB RAM and Apple M1",
                "category" => "mobile",
                "gallery" => "https://cdn.shopify.com/s/files/1/2505/6374/products/nokia_5_4-front_back-polar_night.png?v=1613496123"
            ],
           ]
        );
    }
}
