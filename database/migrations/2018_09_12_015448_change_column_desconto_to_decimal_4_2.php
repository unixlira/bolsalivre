<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnDescontoToDecimal42 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->decimal('desconto', 4, 2)->change();
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
            $table->decimal('desconto', 4, 2)->change();
        });
    }
}
