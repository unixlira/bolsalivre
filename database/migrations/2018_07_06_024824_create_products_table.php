<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('name');
            $table->string('slug')->index();
            $table->text('description');
            $table->unsignedInteger('institution_id');
            $table->foreign('institution_id')
                ->references('id')->on('institutions')
                ->onDelete('cascade'); 
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')
                ->references('id')->on('subcategories')
                ->onDelete('cascade'); 
            $table->unsignedInteger('numero_de_vagas');
            $table->decimal('valor_sem_desconto', 5, 2);
            $table->decimal('porcentagem_aplicada', 4, 0);
            $table->string('image')->nullable();
            $table->boolean('active');
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
        Schema::dropIfExists('products');
    }
}
