<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CityTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        DB::table('cities')->insert([
            0 => [
                'id' => '1',
                'name' => 'Rio de Janeiro',
                'slug' => 'rio-de-janeiro',
                'state_id' => '19',
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            1 => [
                'id' => '2',
                'name' => 'Niterói',
                'slug' => 'niteroi',
                'state_id' => '19',
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            2 => [
                'id' => '3',
                'name' => 'Nova Iguaçu',
                'slug' => 'nova-iguacu',
                'state_id' => '19',
                'status' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
