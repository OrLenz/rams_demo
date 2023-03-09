<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuedGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issued_goods', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouses_id');
            $table->integer('rooms_id');
            $table->integer('quantity');
            $table->string('name_pic');
            $table->text('detail');
            $table->date('date_issued');
            $table->date('date_fixed');
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
        Schema::dropIfExists('issued_goods');
    }
}
