<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInternalSubcategoryToSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcategories', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            // $table->dropUnique('subcategories_name_unique');
            $table->string('internal_subcategory', 60);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn('internal_subcategory');
            $table->string('name', 60)->unique()->change();
        });
    }
}
