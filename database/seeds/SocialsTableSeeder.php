<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socials')->delete();
        DB::table('socials')->insert([
            0 => [
                'id' => '1',
                'facebook' => 'facebook',
                'youtube' => 'youtube',
                'twitter' => 'twitter',
                'instagram' => 'instagram',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
