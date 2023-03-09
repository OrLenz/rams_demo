<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->renameColumn('mentors_id', 'code_rooms_id');
            $table->renameColumn('person_in_charges_id', 'description');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->renameColumn('code_rooms_id', 'mentors_id');
            $table->renameColumn('description', 'person_in_charges_id');
            $table->dropColumn('slug');
        });
    }
}
