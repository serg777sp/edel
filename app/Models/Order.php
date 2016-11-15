<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use Auth;

class Order extends Model
{
    //
    protected $table='orders';
    
    public static function NewOrder($user)
    {
        $order = new Order;
        $order->status = 0;
        $order->user_id = Auth::user()->id;
        $order->step = 1;
        $order->save();   

        foreach($user->baskets()->get() as $basket){
           $orderItem = new OrderItem;
           $orderItem->order_id = $order->id;
           $orderItem->item_id = $basket->item_id;
           $orderItem->kolvo = $basket->kolvo;
           $orderItem->op_val = $basket->op_val;
           $orderItem->end_price = $basket->end_price;
           $orderItem->save();
           $basket->delete();  
        }
    return $order;    
    }
    
    public function setStepOneValues($request,$editStep = true){
        if($request->self){
            $this->self_user = true;
        }else{
            $this->adresat_id = $request->adresat_id;
            $this->self_user = false;
        }
        if($editStep){
            $this->step = 2;
        }   
        $this->save();
    }
    
    public function setStepTwoValues($request,$editStep = true){
        $this->adress = $request->adress;
        if($request->adress === 'other'){
            $this->adress = $request->other_adress;
        }    
        $this->datetime = date('Y-m-d h:i:s',strtotime($request->datetime));
        if($editStep){
            $this->step = 3;
        }    
        $this->save();
    }

    public function setStepThreeValues($request,$editStep = true){
        $this->phone = $this->normalizeNumber($request->phone);
        if($request->phone ==='other'){
            $this->phone = $this->normalizeNumber($request->other_phone);
        }    
        if($request->PS === 'word'){
            $this->voice = $request->PStext;
        }    
        if($request->PS === 'postcard'){
            $this->postcard = $request->PStext;
        }
        if($editStep){
            $this->step = 4;
        }    
        $this->save();
    }
    
    public function editStepsValues($request){
//        dd($request->all());
        switch ($request->stepdata) {
            case 1:
                $this->setStepOneValues($request,false);
                break;
            case 2:
                $this->setStepTwoValues($request,false);
                break;
            case 3:
                $this->setStepThreeValues($request,false);
                break;
        }
    }
    
    public function stepFinish(){
        $this->step=5;
        $this->status = 1;
        $this->save();
    }

    public static function getOrdersNames(){
        $data = [
            '1' => 'оформляется',
            '2' => 'ожидание оплаты',
            '3' => 'ожидание доставки',
            '4' => 'выполнен',
        ];    
    return $data;    
    }
    
    public function getCount(){
           $count = 0;
           $items = OrderItem::all()->where('order_id',$this->id); 
           foreach($items as $item){
               $count += $item['end_price']; 
           }   
    return $count;          
    }
    
    public function getModalWindow(){
        return view('modal.adm.order-show',[ 'order' => $this ]);
    }
    
    public static function getSortQuery($request){
        $order = new self();
        $query = $order->newQuery()->select('*');
        $orderType = $request->orderType;
//        if(!empty($request->catId)){
//            if($request->catId > 0){
//                $query->where('items.cat_id',$request->catId);
//            }    
//        }
        switch ($orderType) {
            case '2':
                    $query = $query->where('status',1);
                    break;
            case '3':
                    $query = $query->where('status',2);
                    break;
            case '4':
                    $query = $query->where('status',3);
                    break;           
        }
//        if(!empty($request->subId)){
//            $query->where('items.sub_id',$request->subId);
//        }
//        if(!empty($request->from)){
//            $query->where('prop_item.price','>',$request->from);
//        }
//        if(!empty($request->to)){
//            $query->where('prop_item.price','<',$request->to);
//        }
//        $query->groupBy('item.id');
        return $query->distinct();
    }
    
    protected function normalizeNumber($phone){
        if($phone){
            return "8-".preg_replace('~(.{3})(.{3})(.{2})(.{2})~','$1-$2-$3-$4', str_pad(substr(preg_replace('~\D~', '', $phone), -10), 10, '*'));
        }    
    }

    //связи
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem');
    }
    
    public function adresat(){
        return $this->belongsTo('App\Models\Adresat');
    }
}
