<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnsLinksAndCategoriesInBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('link')->nullable();
            $table->text('link_2')->nullable();
            $table->text('link_3')->nullable();
            $table->text('category')->nullable();
            $table->text('category_2')->nullable();
            $table->text('category_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('link')->nullable();
            $table->dropColumn('link_2')->nullable();
            $table->dropColumn('link_3')->nullable();
            $table->dropColumn('category')->nullable();
            $table->dropColumn('category_2')->nullable();
            $table->dropColumn('category_3')->nullable();
        });
    }
}
