<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->unsigned();
            $table->integer('product_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institution_product', function (Blueprint $table) {
            Schema::dropIfExists('institution_product');
        });
    }
}
