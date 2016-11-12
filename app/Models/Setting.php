<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public static function getSet()
    {
        $sets = array();
        $s = self::all();
        foreach($s as $ss)
        {
            $sets[$ss->name] = $ss->val;
        }
    return $sets;    
    }
}
