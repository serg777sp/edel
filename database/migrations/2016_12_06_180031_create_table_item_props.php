<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItemProps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('item_props', function(Blueprint $table){
            $table->increments('id');
            $table->smallInteger('size')->nullable();
            $table->decimal('price',7,2)->nullable();
            $table->string('img_url')->nullable();
            $table->tinyInteger('type');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');
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
        //
        Schema::drop('item_props');
    }
}