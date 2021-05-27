<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_delivery')->truncate();

        $this->command->getOutput()->progressStart(3);

        $delivery = [
            ['name' => 'Samovuvoz', 'description' => 'Самовывоз из магазина'],
            ['name' => 'Pochta', 'description' => 'Отправка почтой'],
            ['name' => 'Kurer', 'description' => 'Отправка курьером по адресу'],
        ];
        foreach ($delivery as $k => $item) {
            DB::table('d_delivery')->insert([
                'name' => $item['name'],
                'description' => $item['description'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
