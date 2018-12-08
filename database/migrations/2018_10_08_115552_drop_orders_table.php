<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            Schema::dropIfExists('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned(); //Usuário que fez o pedido
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

            $table->boolean('pedido_finalizado')->default(0);
            $table->boolean('pagamento_aprovado')->default(0);

            $table->timestamps();
        });
    }
}
