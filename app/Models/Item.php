<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
use App\Models\Itemprop;
use DB;

class Item extends Model
{

    const BUKET = 0;
    const FLOWER = 1;

    //Метод получения массива имен товаров
    public static function getNames()
    {
       $items = self::all();
       $itemnames = array();
       foreach($items as $item){
           $itemnames[(int)$item->id] = $item->name;
       }
    return $itemnames;
    }
    //Метод создания нового букета
    public static function newBuket($request)
    {
        try{
            if(!file_exists('img/original/' . $request->foto->getClientOriginalName())){
        //        var_dump('file not exist');
                $request->file('foto')->move(public_path('img/original/'), $request->file('foto')->getClientOriginalName());
                $imageR = Image::make('img/original/'.$request->file('foto')->getClientOriginalName())->resize(300,225);
                $imageR->save('img/small/'.$request->file('foto')->getClientOriginalName());
            }
            $item = new Item;
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            if(!empty($request->input('cat')))$item->cat_id = $request->input('cat');
            if(!empty($request->input('sub')))$item->sub_id = $request->input('sub');
            $item->viewtype = 0;
            $item->save();
            $item->saveItemProp($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    return 'Букет ' . $item->name . 'успешно создан!';
    }

    //Метод сохранения свойств товара в базу
    public function saveItemProp($request){
        if(!$this->viewtype){
            //для букетов
            Itemprop::createNewProp(1,$request->all(),$this->id);
        }
        if($this->viewtype){
            //для штучных
            Itemprop::createNewProp(2,$request->all(),$this->id);
        }
    }

    //Метод создания нового штучного
    public static function newFlower($request)
    {
	try {
	    if(!file_exists('img/original/' . $request->foto->getClientOriginalName()){
    		$request->file('foto')->move(public_path('img/original/'), $request->file('foto')->getClientOriginalName());
    		$imageR = Image::make('img/original/'.$request->file('foto')->getClientOriginalName())->resize(300,225);
    		$imageR->save('img/small/'.$request->file('foto')->getClientOriginalName());
	    }

    	    $item = new Item;
    	    $item->name = $request->input('name');
    	    $item->url= $request->file('foto')->getClientOriginalName();
    	    $item->description = $request->input('description');
    	    if(!empty($request->input('cat')))$item->cat_id = $request->input('cat');
    	    if(!empty($request->input('sub')))$item->sub_id = $request->input('sub');
    	    $item->viewtype = 1;
    	    $item->save();
	    $item->saveItemProp($request);
	} catch(Exception $e){
	    return $e->getMessge();
	}
    return $item;
    }
    //метод добавления фото
    public static function addphoto(Request $request)
    {
    $request->file('foto')->move(public_path('img/original/'), $request->file('foto')->getClientOriginalName());
    $prop = new Itemprop;
    $prop->imgurl = $request->file('foto')->getClientOriginalName();
    $prop->item_id = $request->input('item_id');
    if($request->input('viewtype') == 1)$prop->name = 'фото';
    if($request->input('viewtype') == 0)
    {
        $prop->name = 'размер+фото' ;
        $prop->razmer = $request->input('razmer');
    }
    $prop->save();
    return 'Фото добавлено';
    }
    //Метод обновления фото
    public static function updatephoto(Request $request)
    {
 //  dd($request->input('item_id'));
    $request->file('foto')->move(public_path('img/original/'), $request->file('foto')->getClientOriginalName());
    $item = Item::find($request->input('item_id'));
    $props = Itemprop::all()->where('item_id',$item->id)->toArray();
    $imgs = Itemprop::getImgsInProp($props,$request->input('viewtype'));
  //  dd($imgs);
    if($request->input('viewtype')==0){
       foreach($imgs as $key => $value){
           if($key == $request->input('razmer')){
               echo 'Было совпадение урл';
              if(Storage::disk('public')->exists('/img/original/'.$value))Storage::disk('public')->delete('/img/original/'.$value);
              $oldimg = Itemprop::where('imgurl','=',$value);
              $newimg = Itemprop::createNewProp('размер+фото',$request->input('razmer'),$request->file('foto')->getClientOriginalName(),$request->input('item_id'));
           }
       }
    }
    if($request->input('viewtype')==1){
       foreach($imgs as $key => $value){
           if($key == $request->input('razmer')){
              echo 'Было совпадение урл';
              if(Storage::disk('public')->exists('/img/original/'.$value))Storage::disk('public')->delete('/img/original/'.$value);
              $oldimg = Itemprop::where('imgurl','=',$value);
              $newimg = Itemprop::createNewProp('фото',$request->file('foto')->getClientOriginalName(),1,$request->input('item_id'));
           }
       }
    }
    if($request->input('imp')=='true'){
       $imageR = Image::make('img/original/'.$request->file('foto')->getClientOriginalName())->resize(300,225);
       $imageR->save('img/small/'.$request->file('foto')->getClientOriginalName());
       if(Storage::disk('public')->exists('/img/small/'.$oldimg->imgurl))Storage::disk('public')->delete('/img/original/'.$oldimg->imgurl);
       $item->url= $request->file('foto')->getClientOriginalName();
       $item->save();
    }
    $oldimg->delete();
    return 'Фото обновлено';
    }
    //Метод редактирования цен
    public static function editprice(Request $request,$viewtype)
    {
      $props = Itemprop::where('item_id', '=',$request->input('item_id'))->get();
      $mess='';
      if($viewtype==0){
        for($i=1; $i<4;$i++){
          if(!empty($request->input($i))){
            $oldprice = Itemprop::getOldPrice($props,$i,'цена+размер');

            if(!empty($oldprice)){
               $oldprice->price = $request->input($i);
               $oldprice->save();
               $mess .= '|'.$i.' цена изменена ';
            }else{
               Itemprop::createNewProp('цена+размер',$request->input($i),$i,$request->input('item_id'));
               $mess .= '|'.$i.' цена создана ';
            }
          }
        }
      }
      if($viewtype==1){
        for($i=50; $i<120;$i+=10){
          if(!empty($request->input($i))){
            $oldprice = Itemprop::getOldPrice($props,$i,'цена+длина');
            if(!empty($oldprice)){
               $oldprice->price = $request->input($i);
               $oldprice->save();
               $mess .= '|'.$i.' цена изменена ';
            }else{
               Itemprop::createNewProp('цена+длина',$request->input($i),$i,$request->input('item_id'));
               $mess .= '|'.$i.' цена создана ';
            }
          }
        }
      }
    return $mess;
    }

    public static function getSortQueryNotAjax($request){
        $item = new Item;
        $query = $item->newQuery()->select('items.*');
//        $query->join('prop_item','items.id','=','prop_item.item_id','left');
        if(!empty($request->catId)){
            if($request->catId > 0){
                $query->where('items.cat_id',$request->catId);
            }
        }
        if(!empty($request->subId)){
            $query->where('items.sub_id',$request->subId);
        }
//        if(!empty($request->from)){
//            $query->where('prop_item.price','>',$request->from);
//        }
//        if(!empty($request->to)){
//            $query->where('prop_item.price','<',$request->to);
//        }
//        $query->groupBy('item.id');
        return $query->distinct();
    }

    public static function getSortQuery($request){
        $item = new Item;
        $query = $item->newQuery()->select('items.*');
        $query->join('item_props','items.id','=','item_props.item_id','left');
        if(!empty($request->catId)){
            if($request->catId > 0){
                $query->where('items.cat_id',$request->catId);
            }
        }
        if(!empty($request->subId)){
            $query->where('items.sub_id',$request->subId);
        }
        if(!empty($request->from)){
            $query->where('item_props.price','>',$request->from);
        }
        if(!empty($request->to)){
            $query->where('item_props.price','<',$request->to);
        }
//        $query->groupBy('item.id');
        return $query->distinct();
    }

    //Генератор товаров
    public function generate($count){
        for($i = 0; $i < $count; $i++){
            $cat = rand(1,DB::table('categories')->count());
            $subIds = DB::table('subcategories')->select('id')->where('categorie_id',$cat)->get();
            $sub = NULL;
            if(!empty($subIds)){
                $key = array_rand($subIds, 1);
                if($key == 0){
                    if(rand(0,1)){
                        $sub = $subIds[$key]->id;
                    }
                } else {
                    $sub = $subIds[$key]->id;
                }
            }
            $item = new Item;
            $type = rand(0,2);
            if($type){
                $name = 'Букет'.rand(1,100);
                $item->url= 'generateBuk.png';
                $item->description = 'Генерированный букет';
                $item->viewtype = 0;
                $price = rand(1,5000).'.'.rand(0,99);
                $razmer = rand(0,4);
                $item->name = $name;
                $item->cat_id = $cat;
                $item->sub_id = $sub;
                $item->save();
                Itemprop::createNewProp('цена+размер',$price,$razmer,$item->id);
                Itemprop::createNewProp('размер+фото',$razmer,$item->url,$item->id);
            } else {
                $name = 'Цветок'.rand(1,100);
                $item->url= 'generate.jpg';
                $item->description = 'Генерированный цветок';
                $item->viewtype = 1;
                $item->name = $name;
                $item->cat_id = $cat;
                $item->sub_id = $sub;
                $item->save();

                $price = rand(1,1000).'.'.rand(0,100);
                $dlina = rand(6,12).'0';
                Itemprop::createNewProp('цена+длина',$price,(int)$dlina,$item->id);
                Itemprop::createNewProp('фото',$item->url,0,$item->id);
            }
        }
        return true;
    }

    public function getPhotos(){
       return $this->props()->get()->sortBy('razmer');
    }
    public function getImageName(){
        return $this->props()->get()->first()->img_url;
    }

    public function getPrices(){
        return $this->props()->orderBy('price')->get();
    }

    public function getFirstPriceValue(){
        return $this->props()->get()->first()->price;
    }
    public function getFirstSizeName(){
        return $this->props()->get()->first()->getSizeName();
    }
    public function getFirstLength(){
        return $this->props()->get()->first()->size;
    }

    public function getFirstSize(){
        return $this->props()->where('type',1)->first()->razmer;
    }

    //Связи
    public function props(){
        return $this->hasMany('App\Models\Itemprop');
    }

    public function baskets(){
        return $this->hasMany('App\Models\Basket');
    }

    public function orderItem(){
        return $this->hasOne('App\Models\OrderItem');
    }
}
