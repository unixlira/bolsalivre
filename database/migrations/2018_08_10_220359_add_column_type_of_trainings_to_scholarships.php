<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTypeOfTrainingsToScholarships extends Migration
{
    /**
      * Run the migrations.
      *
      * @return void
      */
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->integer('type_of_training_id')->unsigned()->default(1);

            $table->foreign('type_of_training_id')
                    ->references('id')
                    ->on('type_of_trainings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->dropForeign('type_of_training_id');
            $table->dropColumn('type_of_training_id');
        });
    }
}
