<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeOfTrainingsIdToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedInteger('type_of_training_id');           
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('type_of_training_id')
                ->references('id')->on('type_of_trainings')
                ->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['type_of_trainings_id']);
            $table->dropColumn('type_of_trainings_id');
        });
    }
}
