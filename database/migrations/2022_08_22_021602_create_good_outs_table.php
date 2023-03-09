<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_outs', function (Blueprint $table) {
            $table->id();
            $table->integer('goods_id');
            $table->integer('rooms_id');
            $table->string('name_pic');
            $table->integer('quantity');
            $table->date('date_of_out');
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
        Schema::dropIfExists('good_outs');
    }
}
