<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function getUOByID($id){
        $user = self::find($id);
        return $user->name.''.$user->surname;
    }
    
    public function getFIO(){
        return $this->name.' '.$this->surname;
    }
    
    public function getOrderSumma(){
        $summa = 0;
        foreach ($this->baskets as $basket){
            $summa += (float)$basket->end_price;
        }
        return $summa;
    }
    
    public function isAdmin(){
        $res = false;
        if($this->id === 1){
            $res = true;
        }
        return $res;
    }
    //связи
    public function baskets(){
        return $this->hasMany('App\Models\Basket');
    }
    
    public function adresats(){
        return $this->hasMany('App\Models\Adresat');
    }
    
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
