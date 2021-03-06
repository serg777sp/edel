<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use App\Http\Requests;

class Itemprop extends Model
{
    //константы
    const TYPE_PRICE_SIZE = 1;
    const TYPE_PRICE_LENGTH = 2;
    const TYPE_PHOTO = 3;
    const TYPE_SIZE_PHOTO = 4; 
    //
    protected $table='prop_item';
    //метод создания нового свойства товара    
    public static function createNewProp($name,$val1,$val2,$item_id)
    {
    $prop = new Itemprop;
    if($name=='цена+размер'){
        $prop->name = 'цена+размер';
        $prop->price = $val1;
        $prop->razmer = $val2;
    }    
    if($name=='размер+фото'){
        $prop->name = 'размер+фото';
        $prop->razmer = $val1;
        $prop->imgurl = $val2;        
    }
    if($name=='цена+длина'){
        $prop->name = 'цена+длина';
        $prop->price = $val1;
        $prop->dlina = $val2;         
    }
    if($name=='фото')
    {
        $prop->name = 'фото';
        $prop->imgurl= $val1;       
    }        

    $prop->item_id = $item_id;
    $prop->save(); 
    return $prop;
    }
    //метод получения изображений 
    public static function getImgsInProp(array $props, $viewtype)
    {
    $imgs = array();
    if($viewtype == 0){
        foreach ($props as $prop) {
            if($prop['name'] == 'размер+фото' && $prop['razmer'] == 1)$imgs[1] = $prop['imgurl'];
            if($prop['name'] == 'размер+фото' && $prop['razmer'] == 2)$imgs[2] = $prop['imgurl'];
            if($prop['name'] == 'размер+фото' && $prop['razmer'] == 3)$imgs[3] = $prop['imgurl'];
        }
    }
    if($viewtype == 1){
        $i = 1;
        foreach ($props as $prop) {
          if($prop['name'] == 'фото')
          {
             $imgs[$i] = $prop['imgurl'];
             $i++; 
          }
        }
    }
    return $imgs;     
    }
    //Метод получения старой цены от размера или длины
    public static function getOldPrice($props, $val,$name)
    {
        $oldprice = array();
        foreach ($props as $prop) {
           if(($prop->razmer==$val||$prop->dlina==$val) && $prop->name=="$name")
                {
                    $oldprice = $prop;
                    break;
                }             
        }
    return $oldprice;
    }
    //Метод получения всех цен по id товара;
    public static function getAllPrices($props,$item_id)
    {
    $prices = array();
    foreach($props as $prop){
        if($prop['item_id']==$item_id && !empty($prop['price']))
        {
            if(!empty($prop['razmer']))$prices[$prop['razmer']]= $prop['price'];
            if(!empty($prop['dlina']))$prices[$prop['dlina']]= $prop['price'];
        }
    }
    return $prices;    
    }
    //Метод получения цены
    public static function getPrice($item_id,$op_val,$param)
    {
    $price='';
    $props = Itemprop::all()->where('item_id',(int)$item_id)->toArray();       
    if($param==0){
        foreach($props as $prop)
        {
            if(($prop['razmer'] == $op_val) && !empty($prop['price'])){
                $price= $prop['price'];
            }  
        }
    }
    if($param==1){
        foreach($props as $prop)
        {
            if(($prop['dlina'] == $op_val) && !empty($prop['price'])){
                $price= $prop['price'];
            }  
        }
    }    
    return $price;    
    }
    
    public function getSizeName(){
        $res = false;
        if(!empty($this->razmer)){
            switch ($this->razmer){
                case 1:
                    $res = 'Маленький';
                    break;
                case 2:
                    $res = 'Средний';
                    break;
                case 3:
                    $res = 'Большой';
                    break;
            }
            return $res;
        } else {
            return 'нет размера';
        }
    }
    
    //Связи
    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
