<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TypeOfTrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('type_of_trainings')->delete();
        
        \DB::table('type_of_trainings')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Presencial',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'EAD',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
        ));
    }
}
