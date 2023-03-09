<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_loan', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouses_id');
            $table->integer('goods_id');
            $table->string('borrower_name');
            $table->date('date_borrow');
            $table->date('date_return');
            $table->string('status');

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
        Schema::dropIfExists('goods_loan');
    }
}
