<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGoodOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('good_outs', function (Blueprint $table) {
            $table->renameColumn('goods_id', 'warehouses_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('good_outs', function (Blueprint $table) {
            $table->renameColumn('warehouses_id', 'goods_id');
        });
    }
}
