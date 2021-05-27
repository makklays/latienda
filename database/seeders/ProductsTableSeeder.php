<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->truncate();

        $this->command->getOutput()->progressStart(30);

        $delivery = [
            [
                'sku' => '2021-1',
                'category_id' => 36,
                'title' => 'Gerberas Blanka',
                'slug' => 'gerberas-blanca',
                'description' => '',
                'full_description' => '',
                'price' => '100.00',
                'old_price' => '110.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => 1,
            ],
            [
                'sku' => '2021-1',
                'category_id' => 36,
                'title' => 'Gerberas Roja',
                'slug' => 'gerberas-roja',
                'description' => 'Description gerberas-roja. Description gerberas-roja. Description gerberas-roja.
                Description gerberas-roja. Description gerberas-roja. Description gerberas-roja. ',
                'full_description' => 'Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. ',
                'price' => '100.00',
                'old_price' => '115.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => 1,
            ],
            [
                'sku' => '2021-1',
                'category_id' => 36,
                'title' => 'Gerberas Roja',
                'slug' => 'gerberas-roja',
                'description' => 'Description gerberas-roja. Description gerberas-roja. Description gerberas-roja.
                Description gerberas-roja. Description gerberas-roja. Description gerberas-roja. ',
                'full_description' => 'Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. ',
                'price' => '100.00',
                'old_price' => '115.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => 1,
            ],
            [
                'sku' => '2021-1',
                'category_id' => 36,
                'title' => 'Gerberas Roja1',
                'slug' => 'gerberas-roja1',
                'description' => 'Description gerberas-roja1. Description gerberas-roja. Description gerberas-roja.
                Description gerberas-roja. Description gerberas-roja. Description gerberas-roja. ',
                'full_description' => 'Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. ',
                'price' => '100.50',
                'old_price' => '115.50',
                //'img' => '',
                'quantity' => '24',
                'is_active' => 1,
            ],
            [
                'sku' => '2021-1',
                'category_id' => 36,
                'title' => 'Gerberas Roja2',
                'slug' => 'gerberas-roja2',
                'description' => 'Description gerberas-roja2. Description gerberas-roja. Description gerberas-roja.
                Description gerberas-roja. Description gerberas-roja. Description gerberas-roja. ',
                'full_description' => 'Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.

                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. ',
                'price' => '111.00',
                'old_price' => '125.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => 1,
            ],
        ];
        foreach ($delivery as $k => $item) {
            DB::table('products')->insert([
                'sku' => $item['sku'],
                'category_id' => $item['category_id'],
                'title' => $item['title'],
                'slug' => $item['slug'],
                'description' => $item['description'],
                'full_description' => $item['full_description'],
                'price' => $item['price'],
                'old_price' => $item['old_price'],
                'img' => !empty($item['img']) ? $item['img'] : null,
                'quantity' => $item['quantity'],
                'note' => !empty($item['note']) ? $item['note'] : null,
                'is_active' => $item['is_active'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
