<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('name');
            $table->string('slug')->index();
            $table->string('image')->nullable();            
            $table->string('cnpj')->nullable();
            $table->text('address')->nullable();
            $table->string('cep')->nullable();
            $table->string('phone')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('neighborhood_id')->unsigned();
            $table->foreign('neighborhood_id')
                ->references('id')->on('neighborhoods'); 
            $table->text('description')->nullable();    
            $table->boolean('destaque_home');  
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('total_read')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
}
