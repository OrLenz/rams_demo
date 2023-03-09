<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('no_request');
            $table->integer('sub_categories_id');
            $table->integer('categories_id');
            $table->integer('suppliers_id');
            $table->string('code_goods');
            $table->string('stuff');
            $table->string('unit');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('total')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->default('PENDING');
            $table->integer('subtotal')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('tax')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('purchase_requests');
    }
}
