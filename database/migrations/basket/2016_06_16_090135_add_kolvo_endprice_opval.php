<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKolvoEndpriceOpval extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basket', function (Blueprint $table) {
            //
            $table->tinyInteger('kolvo')->nullable();
            $table->tinyInteger('op_val');
            $table->decimal('end_price',7,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basket', function (Blueprint $table) {
            //
            $table->dropColumn('kolvo');
            $table->dropColumn('op_val');
            $table->dropColumn('end_price');
        });
    }
}
