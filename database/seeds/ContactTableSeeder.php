<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();

        DB::table('contacts')->insert([
            0 => [
                'id' => '1',
                'phone' => '(21)2143 9986',
                'phone_hours' => 'Seg - Sex de 09h às 19h',
                'wpp' => '21 99473 7732',
                'wpp_hours' => '21 99473 7732',
                'chat' => 'link_do_chat',
                'chat_hours' => 'Seg - Sex de 09h às 19h',
                'email' => 'contato@bolsalivre.com',
                'address' => 'Av. Presidente Vargas',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
