<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WorkWithUsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_with_uses')->delete();
        DB::table('work_with_uses')->insert([
            0 => [
                'id' => '1',
                'text' => 'Buscamos profissionais comprometidos com a satisfação de nossos clientes e com o crescimento da empresa, que gostam de aprender e queiram evoluir conosco. Se você tem esse perfil, envie seu currículo para rh@bolsalivre.com e venha integrar nossa equipe!',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
