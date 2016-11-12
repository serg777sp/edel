<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class OrderItem extends Model
{
    //
    protected $table='orderItems';
    
//    public static function getAllSumms($user_id)
//    {
//        $summs = array();
//        $summ = Null;
//        if($user_id == 0){
//            $orders = Order::all();
//        }else{    
//            $orders = Order::all()->where('user_id',$user_id);
//        }
//        foreach($orders as $order){
//            $items = OrderItem::all()->where('order_id',$order->id); 
//            $summs[$order->id] = NULL;
//           foreach($items as $item){
//               $summs[$order->id] = $summs[$order->id] + $item['end_price']; 
//           }
//        }   
//    return $summs;    
//    }
    public function name(){
        return $this->item->name;
    }
    
    //Связи

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
    
    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
