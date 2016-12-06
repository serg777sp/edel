<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatAndSubInItemtAble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            //
            $table->integer('cat_id')->unsigned()->nullable();
            $table->integer('sub_id')->unsigned()->nullable();
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('sub_id')->references('id')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //
            $table->dropColumn('cat_id');
            $table->dropColumn('sub_id');
        });
    }
}
