<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        DB::table('permission_role')->delete();
        $this->createPermissions();
        $this->attachRolesWhithPermissions();
    }

    private function createPermissions()
    {
        DB::table('permissions')->insert([
            0 => [
                'id' => '1',
                'name' => 'admin',
                'label' => 'admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            1 => [
                'id' => '2',
                'name' => 'vendedor',
                'label' => 'vendedor',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            2 => [
                'id' => '3',
                'name' => 'diretor',
                'slug' => 'diretor',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            3 => [
                'id' => '4',
                'name' => 'cliente',
                'label' => 'cliente',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }

    private function attachRolesWhithPermissions()
    {
        DB::table('permission_role')->insert([
            0 => [
                'id' => '1',
                'permission_id' => '1',
                'role_id' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            1 => [
                'id' => '2',
                'permission_id' => '2',
                'role_id' => '2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            2 => [
                'id' => '3',
                'permission_id' => '3',
                'role_id' => '3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            3 => [
                'id' => '4',
                'permission_id' => '4',
                'role_id' => '4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
