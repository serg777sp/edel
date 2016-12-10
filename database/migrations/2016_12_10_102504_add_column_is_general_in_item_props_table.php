<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIsGeneralInItemPropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('item_props', function (Blueprint $table){
            $table->tinyInteger('is_general')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('item_props', function (Blueprint $table){
            $table->dropColumn('is_general');
        });
    }
}
