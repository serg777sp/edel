<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->text('postcard')->nullable();
            $table->datetime('datetime')->nulable();
            $table->integer('user_id')->unsigned();
            $table->integer('adresat_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('adresat_id')->references('id')->on('adresat');
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
        Schema::drop('orders');
    }
}
