<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); //Usuário que fez o pedido
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

            $table->integer('scholarship_id')->unsigned();
            $table->foreign('scholarship_id')
                    ->references('id')
                    ->on('scholarships');

            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')
                    ->references('id')
                    ->on('institutions');
            $table->string('inst_name');
            $table->string('inst_unidade');

            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')
                    ->references('id')
                    ->on('subcategories');
            $table->string('sub_name');

            $table->integer('shift_id')->unsigned();
            $table->foreign('shift_id')
                    ->references('id')
                    ->on('shifts');
            $table->string('shift_name');

            $table->decimal('valor_final');
            $table->boolean('finalizado')->default(0);

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
        Schema::dropIfExists('orders');
    }
}
