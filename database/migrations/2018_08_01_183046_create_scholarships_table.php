<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institution_id');
            $table->foreign('institution_id')
                ->references('id')->on('institutions')
                ->onDelete('cascade'); 
            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')
                ->references('id')->on('subcategories')
                ->onDelete('cascade'); 
            $table->unsignedInteger('shift_id');
            $table->foreign('shift_id')
                ->references('id')->on('shifts')
                ->onDelete('cascade'); 
            $table->decimal('mensalidade', 5, 2);
            $table->decimal('desconto', 4, 0);
            $table->unsignedInteger('vagas_estoque');
            $table->unsignedInteger('vagas_site');
            $table->unsignedInteger('parcelas');
            $table->boolean('inscricao');
            $table->boolean('evolucao_preco');
            $table->boolean('fora_estoque');
            $table->timestamps();
            $table->unsignedBigInteger('total_read')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
