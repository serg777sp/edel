<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    
    public function updateProfile($request){
        if(!empty($request->input('name')))$this->name = $request->input('name');
        if(!empty($request->input('surname'))) $this->surname = $request->input('surname');
        if(!empty($request->input('phone')))$this->phone = $request->input('phone');
        if(!empty($request->input('adress')))$this->adress = $request->input('adress');         
        $this->save();
    }
    
    public function editPass($request){
        if(Hash::check($request->oldpass, $this->password) || Auth::user()->isAdmin()){
            $this->password = bcrypt($request->password);
            $this->save();
            return 'Пароль изменен';
        }else{
            return 'Изменение пароля отклонено, введен неверный пароль'; 
        } 
    }
    
    public function getBasketSum(){
        $sum = '';
        foreach(Auth::user()->baskets as $basket)
        {
            $sum += $basket['end_price']; 
        }
    return $sum;         
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
