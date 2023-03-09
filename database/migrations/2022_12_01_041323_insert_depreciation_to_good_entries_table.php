<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDepreciationToGoodEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('good_entries', function (Blueprint $table) {
            $table->integer('useful_life');
            $table->integer('residual_value');
            $table->integer('accumulated_depreciation')->nullable();
            $table->integer('net_book_value')->nullable();
            $table->integer('rate_of_depreciation')->nullable();
            $table->integer('depreciation_expense')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('good_entries', function (Blueprint $table) {
            $table->dropColumn('useful_life');
            $table->dropColumn('residual_value');
            $table->dropColumn('accumulated_depreciation');
            $table->dropColumn('net_book_value');
            $table->dropColumn('rate_of_depreciation');
            $table->dropColumn('depreciation_expense');
        });
    }
}
