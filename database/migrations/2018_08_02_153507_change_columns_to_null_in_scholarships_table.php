<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsToNullInScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->decimal('mensalidade', 5, 2)->nullable()->change();
            $table->decimal('desconto', 4, 0)->nullable()->change();
            $table->unsignedInteger('vagas_estoque')->nullable()->change();
            $table->unsignedInteger('vagas_site')->nullable()->change();
            $table->unsignedInteger('parcelas')->nullable()->change();
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
            $table->decimal('mensalidade', 5, 2)->change();
            $table->decimal('desconto', 4, 0)->change();
            $table->unsignedInteger('vagas_estoque')->change();
            $table->unsignedInteger('vagas_site')->change();
            $table->unsignedInteger('parcelas')->change();
        }); 
    }
}
