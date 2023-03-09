<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNamePicInGoodEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('good_entries', function (Blueprint $table) {
            $table->renameColumn('name_pic', 'code_goods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('good_entries', function (Blueprint $table) {
            $table->renameColumn('code_goods', 'name_pic');
        });
    }
}
