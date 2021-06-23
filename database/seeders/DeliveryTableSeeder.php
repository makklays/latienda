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
            [
                'name_ru' => 'Самовывоз',
                'name_en' => 'Pickup',
                'name_es' => 'Recoger',
                'description_ru' => 'Самовывоз из магазина.',
                'description_en' => 'Pickup from the store.',
                'description_es' => 'Recogida en tienda.',
            ],
            [
                'name_ru' => 'Почтой',
                'name_en' => 'By post',
                'name_es' => 'Por correo',
                'description_ru' => 'Отправка почтовой компанией.',
                'description_en' => 'Sending by the postal company.',
                'description_es' => 'Envío por la empresa postal.',
            ],
            [
                'name_ru' => 'Курьером',
                'name_en' => 'By courier',
                'name_es' => 'Mensajero',
                'description_ru' => 'Доставка нашим курьером на автомобиле.',
                'description_en' => 'Delivery by our courier by car.',
                'description_es' => 'Entrega por nuestro mensajero en coche.',
            ],
        ];
        foreach ($delivery as $k => $item) {
            DB::table('d_delivery')->insert([
                'name_ru' => $item['name_ru'],
                'name_en' => $item['name_en'],
                'name_es' => $item['name_es'],
                'description_ru' => $item['description_ru'],
                'description_en' => $item['description_en'],
                'description_es' => $item['description_es'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
