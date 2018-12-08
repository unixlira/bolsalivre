<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // $this->deleteTables();

        //$this->call(UsersTableSeeder::class);
        //factory(App\TypeOfTraining::class, 3)->create();

        // $this->call(StateTableSeeder::class);
        // $this->call(CityTableSeeder::class);
        // $this->call(ShiftsTableSeeder::class);
        // $this->call(TypeOfTrainingTableSeeder::class);
        // $this->call(SubcategoryTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(ProductTableSeeder::class);
        // $this->call(ContactTableSeeder::class);
        // $this->call(WorkWithUsesTableSeeder::class);
        // $this->call(SocialsTableSeeder::class);
        // $this->call(FaqTableSeeder::class);
        // $this->call(PermissionTableSeeder::class);
        $this->call(NeighborhoodTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    public function deleteTables()
    {
        DB::table('categories')->delete();
        DB::table('category_product')->delete();
        DB::table('category_subcategory')->delete();
        DB::table('cities')->delete();
        DB::table('contacts')->delete();
        DB::table('faqs')->delete();
        DB::table('institution_product')->delete();
        DB::table('institution_shift')->delete();
        DB::table('institutions')->delete();
        DB::table('neighborhoods')->delete();
        DB::table('products')->delete();
        DB::table('scholarship_tag')->delete();
        DB::table('scholarships')->delete();
        DB::table('shifts')->delete();
        DB::table('socials')->delete();
        DB::table('states')->delete();
        DB::table('type_of_trainings')->delete();
        DB::table('Neighborhoods')->delete();
    }
}
