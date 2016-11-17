<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Itemprop;

class Basket extends Model
{
    //
    protected $table='basket';
    //Метод подсчета итоговой суммы заказа
    public static function getSumma($baskets)
    {
        $sum = '';
        foreach($baskets as $basket)
        {
            $sum += $basket['end_price']; 
        }
    return $sum;    
    }
    

    //Добавления новго товара в корзину
    public function NewBasket($user_id,$item_id,$kolvo,$op_val)
    {    
       $this->user_id = $user_id;
       $this->item_id = $item_id;
       $this->op_val = $op_val;
       if($kolvo>1)$this->kolvo = $kolvo;
       if($op_val<10){    
           $this->end_price = Itemprop::getPrice($item_id,$op_val,0);                                  
       }    
       if($op_val>10){
           $this->end_price = (int)$kolvo*(Itemprop::getPrice($item_id,$op_val,1));
       }          
       $this->save();  
    }
    //Получение сумм и количества товаров
    public static function getBasketVars($data,$user_id)
    {
       $bass = Basket::all()->where('user_id',(int)$user_id);
       $summa = null;
       foreach($bass as $bas){
           $summa = $summa + $bas['end_price'];
       }
       $data['item_count'] = Basket::all()->where('user_id',(int)$user_id)->count();
       $data['summa'] = $summa;
    return $data;
    }
    
    //связи 
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
