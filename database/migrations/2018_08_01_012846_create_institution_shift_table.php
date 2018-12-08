<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_shift', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->unsigned();
            $table->integer('shift_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institution_shift', function (Blueprint $table) {
            Schema::dropIfExists('institution_shift');
        });
    }
}
