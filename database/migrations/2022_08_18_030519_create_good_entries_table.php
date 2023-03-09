<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('goods_id');
            $table->integer('rooms_id');
            $table->string('name_pic');
            $table->date('date_of_entry');
            $table->integer('quantity');
            $table->string('condition');
            $table->string('slug');

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
        Schema::dropIfExists('good_entries');
    }
}
