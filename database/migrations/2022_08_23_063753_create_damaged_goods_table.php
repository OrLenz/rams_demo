<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamagedGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damaged_goods', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouses_id');
            $table->integer('rooms_id');
            $table->integer('quantity');
            $table->string('name_pic');
            $table->date('date_damaged');
            $table->date('date_repaired');
            $table->string('condition');
            $table->string('slug');
            $table->softDeletes();

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
        Schema::dropIfExists('damaged_goods');
    }
}
