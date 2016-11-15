<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    protected function normalizeNumber($phone){
//        $type = $this->getTypeNumber($phone);
//        if($type!='ru'){
//            if($type=='ua'){
//                return "+380-".preg_replace('~(.{2})(.{3})(.{2})(.{2})~','$1-$2-$3-$4', str_pad(substr(preg_replace('~\D~', '', $phone), -9), 9, '*'));
//            }
//            if($type=='by'){
//                return "+375-".preg_replace('~(.{2})(.{3})(.{2})(.{2})~','$1-$2-$3-$4', str_pad(substr(preg_replace('~\D~', '', $phone), -9), 9, '*'));
//            }
//        }
        if($phone){
            return "8-".preg_replace('~(.{3})(.{3})(.{2})(.{2})~','$1-$2-$3-$4', str_pad(substr(preg_replace('~\D~', '', $phone), -10), 10, '*'));
        }    
    }
}
