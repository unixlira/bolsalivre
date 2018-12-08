<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('category_subcategory')->delete();
        $this->createCategories();
        $this->attachCategoryWhithSubcategory();
    }

    private function createCategories()
    {
        DB::table('categories')->insert([
            0 => [
                'id' => '1',
                'name' => 'Educação Infantil',
                'internal_category' => 'Educação Infantil',
                'slug' => 'educacao-infantil',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            1 => [
                'id' => '2',
                'name' => 'Ensino Fundamental I',
                'internal_category' => 'Ensino Fundamental I',
                'slug' => 'ensino-fundamental-i',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            2 => [
                'id' => '3',
                'name' => 'Ensino Fundamental II',
                'internal_category' => 'Ensino Fundamental II',
                'slug' => 'ensino-fundamental-ii',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            3 => [
                'id' => '4',
                'name' => 'Ensino Médio',
                'internal_category' => 'Ensino Médio',
                'slug' => 'ensino-medio',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            4 => [
                'id' => '5',
                'name' => 'Técnico',
                'internal_category' => 'Técnico',
                'slug' => 'tecnico',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            5 => [
                'id' => '6',
                'name' => 'Profissionalizante',
                'internal_category' => 'Profissionalizante',
                'slug' => 'profissionalizante',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            6 => [
                'id' => '7',
                'name' => 'Preparatório',
                'internal_category' => 'Preparatório',
                'slug' => 'preparatorio',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            7 => [
                'id' => '8',
                'name' => 'Graduação',
                'internal_category' => 'Graduação',
                'slug' => 'graduacao',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            8 => [
                'id' => '9',
                'name' => 'Pós & MBA',
                'internal_category' => 'Pós & MBA',
                'slug' => 'pos-e-mba',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            9 => [
                'id' => '10',
                'name' => 'Idiomas',
                'internal_category' => 'Idiomas',
                'slug' => 'idiomas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            10 => [
                'id' => '11',
                'name' => 'Fundamental II',
                'internal_category' => 'Fundamental II EJA',
                'slug' => 'fundamental-ii-eja',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            11 => [
                'id' => '12',
                'name' => 'Ensino Médio',
                'internal_category' => 'Ensino Médio EJA',
                'slug' => 'ensino-medio-eja',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }

    private function attachCategoryWhithSubcategory()
    {
        DB::table('category_subcategory')->insert([
            0 => [
                'id' => '1',
                'category_id' => '1',
                'subcategory_id' => '1',
            ],
            1 => [
                'id' => '2',
                'category_id' => '1',
                'subcategory_id' => '2',
            ],
            2 => [
                'id' => '3',
                'category_id' => '1',
                'subcategory_id' => '3',
            ],
            3 => [
                'id' => '4',
                'category_id' => '1',
                'subcategory_id' => '4',
            ],
            4 => [
                'id' => '5',
                'category_id' => '1',
                'subcategory_id' => '5',
            ],
            5 => [
                'id' => '6',
                'category_id' => '2',
                'subcategory_id' => '6',
            ],
            6 => [
                'id' => '7',
                'category_id' => '2',
                'subcategory_id' => '7',
            ],
            7 => [
                'id' => '8',
                'category_id' => '2',
                'subcategory_id' => '8',
            ],
            8 => [
                'id' => '9',
                'category_id' => '2',
                'subcategory_id' => '9',
            ],
            9 => [
                'id' => '10',
                'category_id' => '2',
                'subcategory_id' => '10',
            ],
            10 => [
                'id' => '11',
                'category_id' => '2',
                'subcategory_id' => '11',
            ],
            11 => [
                'id' => '12',
                'category_id' => '3',
                'subcategory_id' => '12',
            ],
            12 => [
                'id' => '13',
                'category_id' => '3',
                'subcategory_id' => '13',
            ],
            13 => [
                'id' => '14',
                'category_id' => '3',
                'subcategory_id' => '14',
            ],
            14 => [
                'id' => '15',
                'category_id' => '3',
                'subcategory_id' => '15',
            ],
            15 => [
                'id' => '16',
                'category_id' => '3',
                'subcategory_id' => '16',
            ],
            16 => [
                'id' => '17',
                'category_id' => '3',
                'subcategory_id' => '17',
            ],
            17 => [
                'id' => '18',
                'category_id' => '4',
                'subcategory_id' => '18',
            ],
            18 => [
                'id' => '19',
                'category_id' => '4',
                'subcategory_id' => '19',
            ],
            19 => [
                'id' => '20',
                'category_id' => '4',
                'subcategory_id' => '20',
            ],
            20 => [
                'id' => '21',
                'category_id' => '4',
                'subcategory_id' => '21',
            ],
            21 => [
                'id' => '22',
                'category_id' => '4',
                'subcategory_id' => '22',
            ],
            22 => [
                'id' => '23',
                'category_id' => '4',
                'subcategory_id' => '23',
            ],
            23 => [
                'id' => '24',
                'category_id' => '4',
                'subcategory_id' => '24',
            ],
            24 => [
                'id' => '25',
                'category_id' => '4',
                'subcategory_id' => '25',
            ],
            25 => [
                'id' => '26',
                'category_id' => '4',
                'subcategory_id' => '26',
            ],
            26 => [
                'id' => '27',
                'category_id' => '4',
                'subcategory_id' => '27',
            ],
            27 => [
                'id' => '28',
                'category_id' => '4',
                'subcategory_id' => '28',
            ],
            28 => [
                'id' => '29',
                'category_id' => '4',
                'subcategory_id' => '29',
            ],
            29 => [
                'id' => '30',
                'category_id' => '5',
                'subcategory_id' => '30',
            ],
            30 => [
                'id' => '31',
                'category_id' => '5',
                'subcategory_id' => '31',
            ],
            31 => [
                'id' => '32',
                'category_id' => '5',
                'subcategory_id' => '32',
            ],
            32 => [
                'id' => '33',
                'category_id' => '6',
                'subcategory_id' => '33',
            ],
            33 => [
                'id' => '34',
                'category_id' => '6',
                'subcategory_id' => '34',
            ],
            34 => [
                'id' => '35',
                'category_id' => '7',
                'subcategory_id' => '35',
            ],
            35 => [
                'id' => '36',
                'category_id' => '7',
                'subcategory_id' => '36',
            ],
            36 => [
                'id' => '37',
                'category_id' => '7',
                'subcategory_id' => '37',
            ],
            37 => [
                'id' => '38',
                'category_id' => '7',
                'subcategory_id' => '38',
            ],
            38 => [
                'id' => '39',
                'category_id' => '7',
                'subcategory_id' => '39',
            ],
            39 => [
                'id' => '40',
                'category_id' => '7',
                'subcategory_id' => '40',
            ],
            40 => [
                'id' => '41',
                'category_id' => '8',
                'subcategory_id' => '41',
            ],
            41 => [
                'id' => '42',
                'category_id' => '8',
                'subcategory_id' => '42',
            ],
            42 => [
                'id' => '43',
                'category_id' => '8',
                'subcategory_id' => '43',
            ],
            43 => [
                'id' => '44',
                'category_id' => '8',
                'subcategory_id' => '44',
            ],
            44 => [
                'id' => '45',
                'category_id' => '8',
                'subcategory_id' => '45',
            ],
            45 => [
                'id' => '46',
                'category_id' => '9',
                'subcategory_id' => '46',
            ],
            46 => [
                'id' => '47',
                'category_id' => '9',
                'subcategory_id' => '47',
            ],
            47 => [
                'id' => '48',
                'category_id' => '9',
                'subcategory_id' => '48',
            ],
            48 => [
                'id' => '49',
                'category_id' => '10',
                'subcategory_id' => '49',
            ],
            49 => [
                'id' => '50',
                'category_id' => '10',
                'subcategory_id' => '50',
            ],
            50 => [
                'id' => '51',
                'category_id' => '10',
                'subcategory_id' => '51',
            ],
            51 => [
                'id' => '52',
                'category_id' => '10',
                'subcategory_id' => '52',
            ],
            52 => [
                'id' => '53',
                'category_id' => '10',
                'subcategory_id' => '53',
            ],
            53 => [
                'id' => '54',
                'category_id' => '10',
                'subcategory_id' => '54',
            ],
            54 => [
                'id' => '55',
                'category_id' => '10',
                'subcategory_id' => '55',
            ],
            55 => [
                'id' => '56',
                'category_id' => '11',
                'subcategory_id' => '56',
            ],
            56 => [
                'id' => '57',
                'category_id' => '11',
                'subcategory_id' => '57',
            ],
            57 => [
                'id' => '58',
                'category_id' => '11',
                'subcategory_id' => '58',
            ],
            58 => [
                'id' => '59',
                'category_id' => '11',
                'subcategory_id' => '59',
            ],
            59 => [
                'id' => '60',
                'category_id' => '12',
                'subcategory_id' => '60',
            ],
            60 => [
                'id' => '61',
                'category_id' => '12',
                'subcategory_id' => '61',
            ],
            61 => [
                'id' => '62',
                'category_id' => '12',
                'subcategory_id' => '62',
            ],
        ]);
    }
}
