<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnedGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returned_goods', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouses_id');
            $table->integer('rooms_id');
            $table->integer('suppliers_id');
            $table->string('name_pic');
            $table->integer('quantity');
            $table->string('detail');
            $table->date('date_return');
            $table->date('date_received')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('returned_goods');
    }
}
