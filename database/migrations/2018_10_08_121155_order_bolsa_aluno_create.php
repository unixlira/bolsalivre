<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderBolsaAlunoCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_bolsa_aluno', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders');

            $table->integer('scholarship_id')->unsigned();

            $table->integer('institution_id')->unsigned();
            $table->string('institution_name');
            $table->string('institution_unidade');

            $table->integer('subcategory_id')->unsigned();
            $table->string('subcategory_name');

            $table->integer('category_id')->unsigned();
            $table->string('category_name');

            $table->integer('shift_id')->unsigned();
            $table->string('shift_name');

            $table->decimal('valor_bolsa', 8, 2);

            $table->string('nome_aluno');
            $table->string('endereco_aluno');
            $table->string('nome_responsavel');
            $table->string('email_responsavel');
            $table->string('telefone_responsavel');
            $table->string('cpf_responsavel');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_bolsa_aluno');
    }
}
