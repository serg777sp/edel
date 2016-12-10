<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\Facades\Image;

class Itemprop extends Model
{
    //константы
    const TYPE_BUKET = 1;
    const TYPE_FLOWER = 2;
    const TYPE_FLOWER_PHOTO = 3;
    //
    protected $table='item_props';
    //метод создания нового свойства товара
    public static function createNewProp($type,array $params,$item_id)
    {
    $prop = new Itemprop;
        switch ($type) {
            case 1:
                $prop->size = $params['size'];
                $prop->img_url = $params['foto']->getClientOriginalName();
                $prop->price = $params['price'];
                break;
	    case 2:
		$prop->size = $params['size'];
		$prop->price = $params['price'];
		break;
	    case 3:
		$prop->size = $params['size'];
		$prop->img_url = $params['foto']->getClientOriginalName();
		$prop->price = $params['price'];
		break;
        }

    $prop->type = $type;
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
        if(!empty($this->size)){
            switch ($this->size){
                case 1:
                    $res = 'маленький';
                    break;
                case 2:
                    $res = 'средний';
                    break;
                case 3:
                    $res = 'большой';
                    break;
            }
            return $res;
        } else {
            return 'нет размера';
        }
    }

    public function saveNewImages($foto) {
        if(!file_exists('img/original/' . $foto->getClientOriginalName())){
            $foto->move(public_path('img/original/'), $foto->getClientOriginalName());
            if($this->is_general){
                $imageR = Image::make('img/original/'.$foto->getClientOriginalName())->resize(300,225);
                $imageR->save('img/small/'.$foto->getClientOriginalName());
            }
        }
    }

    public function deleteImages() {
        if(!empty($this->img_url)){
            if(file_exists('img/original/' . $this->img_url)){
                //delete original image
                unlink('img/original/' . $this->img_url);
            }
            if($this->is_general){
                if(file_exists('img/small/' . $this->img_url)){
                    //delete small image
                    unlink('img/small/' . $this->img_url);
                }
            }
        }
    }

    //Связи
    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
