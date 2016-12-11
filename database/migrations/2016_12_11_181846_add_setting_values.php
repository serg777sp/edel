<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Setting;

class AddSettingValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $set = new Setting();
        $set->name = 'phone1';
        $set->value = ' ';
        $set->save();

        $set = new Setting();
        $set->name = 'phone2';
        $set->value = ' ';
        $set->save();

        $set = new Setting();
        $set->name = 'slide1';
        $set->value = ' ';
        $set->save();

        $set = new Setting();
        $set->name = 'slide2';
        $set->value = ' ';
        $set->save();

        $set = new Setting();
        $set->name = 'slide3';
        $set->value = ' ';
        $set->save();

        $set = new Setting();
        $set->name = 'slide4';
        $set->value = ' ';
        $set->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
