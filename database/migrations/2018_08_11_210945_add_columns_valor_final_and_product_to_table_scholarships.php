<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsValorFinalAndProductToTableScholarships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->decimal('valor_final', 7, 2)->nullable();
            $table->integer('product_id')->unsigned()->default(1);

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $table->dropColumn('valor_final');
            $table->dropForeign('product_id');
            $table->dropColumn('product_id');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });
    }
}
