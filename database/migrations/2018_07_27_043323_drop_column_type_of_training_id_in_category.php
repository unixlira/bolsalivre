<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnTypeOfTrainingIdInCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['type_of_training_id']);
            $table->dropColumn('type_of_training_id');
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
            $table->integer('type_of_training_id')->unsigned();
            $table->foreign('type_of_training_id')
                ->references('id')->on('subcategories')
                ->onDelete('cascade');
        });
    }
}
