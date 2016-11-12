<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $itemprops = \App\Models\Itemprop::all();
        foreach ($itemprops as $prop){
            switch ($prop->name){
                case 'цена+размер':
                    $prop->type = 1;
                    break;
                case 'цена+длина':
                    $prop->type = 2;
                    break;
                case 'фото':
                    $prop->type = 3;
                    break;
                case 'размер+фото':
                    $prop->type = 4;
                    break;
            }
            $prop->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $itemprops = \App\Models\Itemprop::all();
        foreach ($itemprops as $prop){
            $prop->type = NULL;
            $prop->save();
        }
    }
}
