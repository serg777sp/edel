<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $table='orderItems';
    
    public function name(){
        return $this->item->name;
    }
    
    public function getEditModal(){
        if($this->item->viewtype === 1){
            return view('modal.order.editOrderItemSingle',['item'=>$this]);
        }else {
            return view('modal.order.editOrderItemBuk',['item'=>$this]);
        }
    }
    
    public function getSizeName(){
        $res = false;
        if(!empty($this->op_val < 4)){
            switch ($this->op_val){
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

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
    
    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
