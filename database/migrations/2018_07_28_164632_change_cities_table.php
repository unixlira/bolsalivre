<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('institutions')->delete();  //Apagando caso tenha algum elemento cadastrado como chave estrangeira
        DB::table('neighborhoods')->delete(); //Apagando caso tenha algum elemento cadastrado como chave estrangeira        
        Schema::dropIfExists('cities');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->string('name');
            $table->integer('status')->default(1);
            $table->string('slug');
            $table->timestamps();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
