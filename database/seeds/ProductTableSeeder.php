<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('category_product')->delete();
        $this->createCategories();
        $this->attachCategoryWhithSubcategory();
    }

    private function createCategories(){
                
        DB::table('products')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Ensino Básico',
                'slug' => 'ensino-basico',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Cursos Técnicos',
                'slug' => 'cursos-tecnicos',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Profissionalizantes',
                'slug' => 'profissionalizantes',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Preparatório',
                'slug' => 'preparatorio',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Graduação',
                'slug' => 'graduacao',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Pós Graduação & MBA',
                'slug' => 'pos-graduacao-e-mba',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Idiomas',
                'slug' => 'idiomas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'EJA',
                'slug' => 'eja',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
        ));
    }

    private function attachCategoryWhithSubcategory(){
        DB::table('category_product')->insert(array (
           0 => 
            array (
                'id' => '1',
                'category_id' => '1',
                'product_id' => '1',
            ),
            1 => 
            array (
                'id' => '2',
                'category_id' => '2',
                'product_id' => '1',
            ),
            2 => 
            array (
                'id' => '3',
                'category_id' => '3',
                'product_id' => '1',
            ),
            3 => 
            array (
                'id' => '4',
                'category_id' => '4',
                'product_id' => '1',
            ),
            4 => 
            array (
                'id' => '5',
                'category_id' => '5',
                'product_id' => '2',
            ),
            5 => 
            array (
                'id' => '6',
                'category_id' => '6',
                'product_id' => '3',
            ),
            6 => 
            array (
                'id' => '7',
                'category_id' => '7',
                'product_id' => '4',
            ),
            7 => 
            array (
                'id' => '8',
                'category_id' => '8',
                'product_id' => '5',  
            ),
            8 => 
            array (
                'id' => '9',
                'category_id' => '9',
                'product_id' => '6',  
            ),
            9 => 
            array (
                'id' => '10',
                'category_id' => '10',
                'product_id' => '7',  
            ),
            10 => 
            array (
                'id' => '11',
                'category_id' => '11',
                'product_id' => '8',  
            ),
            11 => 
            array (
                'id' => '12',
                'category_id' => '12',
                'product_id' => '8',  
            ),           
        ));    
    }
}