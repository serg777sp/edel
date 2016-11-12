<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Setting;

class SmsSender extends Model
{
    public static function sendsms($text){
        $data = [
            "api_id"		=>	self::getApiToken(),
            "to"			=>	self::getPhone(),
            "text"		=> $text,	//iconv("windows-1251","utf-8",$text)
         //   "test" => 1,
        ];
      //  return $data;  
        $ch = curl_init("http://sms.ru/sms/send");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $body = curl_exec($ch);
        curl_close($ch);
        return $body;
    }
    
    protected static function getPhone(){
        $set = Setting::where('name','SmsSender')->firstOrFail();
        return $set->val;
    }
    
    protected static function getApiToken(){
        $set = Setting::where('name','SmsToken')->firstOrFail();
        return $set->val;
    }
}