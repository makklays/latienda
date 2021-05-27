<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_payment')->truncate();

        $this->command->getOutput()->progressStart(2);

        $delivery = [
            ['name' => 'nopaid', 'description' => 'Не оплачен'],
            ['name' => 'paid', 'description' => 'Оплачен'],
        ];
        foreach ($delivery as $k => $item) {
            DB::table('d_payment')->insert([
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
