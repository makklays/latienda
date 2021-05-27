<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_order_status')->truncate();

        $this->command->getOutput()->progressStart(5);

        $delivery = [
            ['name' => 'nopaid', 'description' => 'Заказ не оплачен'],
            ['name' => 'paid', 'description' => 'Заказ оплачен'],
            ['name' => 'packaged', 'description' => 'Заказ подготовлен и спакован'],
            ['name' => 'otpravlen', 'description' => 'Заказ отправлен'],
            ['name' => 'done', 'description' => 'Заказ выполнен'],
        ];
        foreach ($delivery as $k => $item) {
            DB::table('d_order_status')->insert([
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
