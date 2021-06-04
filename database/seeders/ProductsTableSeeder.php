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
                'sku' => '2021-1-1',
                'category_id' => 36,
                'title' => 'Gerberas Blanka',
                'slug' => 'gerberas-blanca',
                'description' => 'Description gerberas-roja. Description gerberas-roja. Description gerberas-roja.
                Description gerberas-roja. Description gerberas-roja. Description gerberas-roja. ',
                'full_description' => 'Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.
                Full description gerberas-roja. Full description gerberas-roja. Full description gerberas-roja.',
                'price' => '100.00',
                'old_price' => '110.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-17',
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
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-19',
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
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-20',
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
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-21',
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
                'is_active' => '1',
            ],

            [
                'sku' => '2021-1-22',
                'category_id' => 36,
                'title' => 'Gerberas Roja21',
                'slug' => 'gerberas-roja21',
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
                'price' => '11.00',
                'old_price' => '12.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-23',
                'category_id' => 36,
                'title' => 'Gerberas Roja22',
                'slug' => 'gerberas-roja22',
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
                'price' => '11.00',
                'old_price' => '15.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-24',
                'category_id' => 36,
                'title' => 'Gerberas Roja23',
                'slug' => 'gerberas-roja23',
                'description' => 'Description gerberas-roja23. Description gerberas-roja. Description gerberas-roja.
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
                'price' => '13.00',
                'old_price' => '13.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-25',
                'category_id' => 36,
                'title' => 'Gerberas Roja25',
                'slug' => 'gerberas-roja25',
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
                'price' => '114.00',
                'old_price' => '115.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-26',
                'category_id' => 36,
                'title' => 'Gerberas Roja26',
                'slug' => 'gerberas-roja26',
                'description' => 'Description gerberas-roja26. Description gerberas-roja. Description gerberas-roja.
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
                'price' => '10.00',
                'old_price' => '10.50',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-18',
                'category_id' => 36,
                'title' => 'Gerberas Roja18',
                'slug' => 'gerberas-roja18',
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
                'price' => '114.00',
                'old_price' => '115.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-219',
                'category_id' => 36,
                'title' => 'Gerberas Roja219',
                'slug' => 'gerberas-roja219',
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
                'price' => '114.00',
                'old_price' => '115.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-250',
                'category_id' => 36,
                'title' => 'Gerberas Roja250',
                'slug' => 'gerberas-roja250',
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
                'price' => '114.00',
                'old_price' => '115.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-30',
                'category_id' => 36,
                'title' => 'Gerberas Roja30',
                'slug' => 'gerberas-roja30',
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
                'price' => '30.00',
                'old_price' => '31.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-31',
                'category_id' => 36,
                'title' => 'Gerberas Roja31',
                'slug' => 'gerberas-roja31',
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
                'price' => '31.00',
                'old_price' => '31.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-32',
                'category_id' => 36,
                'title' => 'Gerberas Roja32',
                'slug' => 'gerberas-roja32',
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
                'price' => '32.00',
                'old_price' => '32.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-33',
                'category_id' => 36,
                'title' => 'Gerberas Roja33',
                'slug' => 'gerberas-roja33',
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
                'price' => '33.00',
                'old_price' => '33.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-34',
                'category_id' => 36,
                'title' => 'Gerberas Roja34',
                'slug' => 'gerberas-roja34',
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
                'price' => '34.00',
                'old_price' => '34.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-35',
                'category_id' => 36,
                'title' => 'Gerberas Roja35',
                'slug' => 'gerberas-roja35',
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
                'price' => '35.00',
                'old_price' => '35.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-36',
                'category_id' => 36,
                'title' => 'Gerberas Roja36',
                'slug' => 'gerberas-roja36',
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
                'price' => '36.00',
                'old_price' => '36.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-37',
                'category_id' => 36,
                'title' => 'Gerberas Roja37',
                'slug' => 'gerberas-roja37',
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
                'price' => '37.00',
                'old_price' => '37.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-38',
                'category_id' => 36,
                'title' => 'Gerberas Roja38',
                'slug' => 'gerberas-roja38',
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
                'price' => '38.00',
                'old_price' => '38.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-39',
                'category_id' => 36,
                'title' => 'Gerberas Roja39',
                'slug' => 'gerberas-roja39',
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
                'price' => '39.00',
                'old_price' => '39.50',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-40',
                'category_id' => 36,
                'title' => 'Gerberas Roja40',
                'slug' => 'gerberas-roja40',
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
                'price' => '40.00',
                'old_price' => '40.50',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
            ],
            [
                'sku' => '2021-1-41',
                'category_id' => 36,
                'title' => 'Gerberas Roja 41',
                'slug' => 'gerberas-roja 41',
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
                'price' => '41.00',
                'old_price' => '42.00',
                //'img' => '',
                'quantity' => '24',
                'is_active' => '1',
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
