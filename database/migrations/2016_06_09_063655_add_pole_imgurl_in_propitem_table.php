<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPoleImgurlInPropitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prop_item', function (Blueprint $table) {
            //
            $table->string('imgurl')->after('razmer')->nullable();
            $table->decimal('price',7,2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prop_item', function (Blueprint $table) {
            //
            $table->dropColumn('imgurl');
            $table->decimal('price',7,2)->change();
        });
    }
}
