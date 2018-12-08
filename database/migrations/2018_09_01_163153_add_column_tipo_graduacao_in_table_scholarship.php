<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTipoGraduacaoInTableScholarship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->text('tipo_graduacao')->nullable();
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
            $table->dropColumn('tipo_graduacao');
        });
    }
}
