<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFieldInGoodsLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods_loan', function (Blueprint $table) {
            $table->renameColumn('goods_id', 'room_source');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_loan', function (Blueprint $table) {
            $table->renameColumn('room_source', 'goods_id');
        });
    }
}
