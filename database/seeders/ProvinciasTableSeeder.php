<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('d_provincia')->truncate();

        $this->command->getOutput()->progressStart(30);

        $provincias = [
            [
                'name_en' => 'Madrid',
                'name_es' => 'Madrid',
                'name_ru' => 'Мадрид',
            ],
            [
                'name_en' => 'Barcelona',
                'name_es' => 'Barcelona',
                'name_ru' => 'Барселона',
            ],
            [
                'name_en' => 'Valencia',
                'name_es' => 'Valencia',
                'name_ru' => 'Валенсия',
            ],
            [
                'name_en' => 'Sevilla',
                'name_es' => 'Sevilla',
                'name_ru' => 'Севилья',
            ],
            [
                'name_en' => 'Alicante',
                'name_es' => 'Alicante',
                'name_ru' => 'Аликанте',
            ],
            [
                'name_en' => 'Malaga',
                'name_es' => 'Málaga',
                'name_ru' => 'Малага',
            ],
            [
                'name_en' => '',
                'name_es' => 'Región de Murcia',
                'name_ru' => 'Мурсия',
            ],
            [
                'name_en' => '',
                'name_es' => 'Cádiz',
                'name_ru' => 'Кадис',
            ],
            [
                'name_en' => '',
                'name_es' => 'Bizkaia',
                'name_ru' => 'Бискайя',
            ],
            [
                'name_en' => '',
                'name_es' => 'Baleares',
                'name_ru' => 'Балеарские острова',
            ],
            [
                'name_en' => '',
                'name_es' => 'La Coruña',
                'name_ru' => 'Ла-Корунья',
            ],
            [
                'name_en' => '',
                'name_es' => 'Las Palmas',
                'name_ru' => 'Лас-Пальмас',
            ],
            [
                'name_en' => '',
                'name_es' => 'Principado de Asturias',
                'name_ru' => 'Астурия',
            ],
            [
                'name_en' => '',
                'name_es' => 'Santa Cruz de Tenerife',
                'name_ru' => 'Санта-Крус-де-Тенерифе',
            ],
            [
                'name_en' => '',
                'name_es' => 'Zaragoza',
                'name_ru' => 'Сарагоса',
            ],
            [
                'name_en' => '',
                'name_es' => 'Pontevedra',
                'name_ru' => 'Понтеведра',
            ],
            [
                'name_en' => '',
                'name_es' => 'Granada',
                'name_ru' => 'Гранада',
            ],
            [
                'name_en' => '',
                'name_es' => 'provincia de Tarragona',
                'name_ru' => 'Таррагона',
            ],
            [
                'name_en' => '',
                'name_es' => 'Córdoba',
                'name_ru' => 'Кордова',
            ],
            [
                'name_en' => '',
                'name_es' => 'Gerona',
                'name_ru' => 'Жирона',
            ],
            [
                'name_en' => '',
                'name_es' => 'Gipuzkoa',
                'name_ru' => 'Гипускоа',
            ],
            [
                'name_en' => '',
                'name_es' => 'Almería',
                'name_ru' => 'Альмерия',
            ],
            [
                'name_en' => '',
                'name_es' => 'Toledo',
                'name_ru' => 'Толедо',
            ],
            [
                'name_en' => '',
                'name_es' => 'Provincia de Badajoz',
                'name_ru' => 'Бадахос',
            ],
            [
                'name_en' => '',
                'name_es' => 'Comunidad Foral de Navarra',
                'name_ru' => 'Наварра',
            ],
            [
                'name_en' => '',
                'name_es' => 'Jaén',
                'name_ru' => 'Хаэн',
            ],
            [
                'name_en' => '',
                'name_es' => 'Cantabria',
                'name_ru' => 'Кантабрия',
            ],
            [
                'name_en' => '',
                'name_es' => 'Castellón',
                'name_ru' => 'Кастельон',
            ],
            [
                'name_en' => '',
                'name_es' => 'Huelva',
                'name_ru' => 'Уэльва',
            ],
            [
                'name_en' => '',
                'name_es' => 'Valladolid',
                'name_ru' => 'Вальядолид',
            ],
            [
                'name_en' => '',
                'name_es' => 'Ciudad Real',
                'name_ru' => 'Сьюдад-Реаль',
            ],
            [
                'name_en' => '',
                'name_es' => 'León',
                'name_ru' => 'Леон',
            ],
            [
                'name_en' => '',
                'name_es' => 'Lleida',
                'name_ru' => 'Льейда',
            ],
            [
                'name_en' => '',
                'name_es' => 'Provincia de Cáceres',
                'name_ru' => 'Касерес',
            ],
            [
                'name_en' => '',
                'name_es' => 'Albacete',
                'name_ru' => 'Альбасете',
            ],
            [
                'name_en' => '',
                'name_es' => 'Burgos',
                'name_ru' => 'Бургос',
            ],
            [
                'name_en' => '',
                'name_es' => 'Salamanca',
                'name_ru' => 'Саламанка',
            ],
            [
                'name_en' => '',
                'name_es' => 'Lugo',
                'name_ru' => 'Луго',
            ],
            [
                'name_en' => '',
                'name_es' => 'Álava',
                'name_ru' => 'Алава',
            ],
            [
                'name_en' => '',
                'name_es' => 'La Rioja',
                'name_ru' => 'Риоха',
            ],
            [
                'name_en' => '',
                'name_es' => 'Orense',
                'name_ru' => 'Оренсе',
            ],
            [
                'name_en' => '',
                'name_es' => 'Guadalajara',
                'name_ru' => 'Гвадалахара',
            ],
            [
                'name_en' => '',
                'name_es' => 'Huesca',
                'name_ru' => 'Уэска',
            ],
            [
                'name_en' => '',
                'name_es' => 'Cuenca',
                'name_ru' => 'Куэнка',
            ],
            [
                'name_en' => '',
                'name_es' => 'Zamora',
                'name_ru' => 'Самора',
            ],
            [
                'name_en' => '',
                'name_es' => 'Palencia',
                'name_ru' => 'Паленсия',
            ],
            [
                'name_en' => '',
                'name_es' => 'Ávila',
                'name_ru' => 'Авила',
            ],
            [
                'name_en' => '',
                'name_es' => 'Segovia',
                'name_ru' => 'Сеговия',
            ],
            [
                'name_en' => '',
                'name_es' => 'Teruel',
                'name_ru' => 'Теруэль',
            ],
            [
                'name_en' => '',
                'name_es' => 'Soria',
                'name_ru' => 'Сория',
            ],
            [
                'name_en' => 'Мелилья',
                'name_es' => 'Мелилья',
                'name_ru' => 'Мелилья',
            ],
            [
                'name_en' => 'Сеута',
                'name_es' => 'Сеута',
                'name_ru' => 'Сеута',
            ],
        ];

        foreach ($provincias as $k => $item) {
            DB::table('d_provincia')->insert([
                'name_ru' => $item['name_ru'],
                'name_en' => $item['name_en'],
                'name_es' => $item['name_es'],

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
