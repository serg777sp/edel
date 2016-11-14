<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class Adresat extends Model
{
    //
    protected $table='adresats';
    
    public function NewAdresat(Request $request,$user = NULL)
    {
          $this->name = $request->input('name');
          $this->surname = $request->input('surname');
          if($user === NULL){
            $this->user_id = Auth::user()->id;
          } else {
            $this->user_id = $user->id;  
          }  
          if(!empty($request->input('phone')))$this->phone = $request->input('phone');
          if(!empty($request->input('adress')))$this->adress = $request->input('adress');         
          $this->save();            
    }
    public function UpdateAdr(Request $request)
    {             
          if(!empty($request->name))$this->name = $request->name;
          if(!empty($request->surname)) $this->surname = $request->surname;
          if(!empty($request->phone))$this->phone = $request->phone;
          if(!empty($request->adress))$this->adress = $request->adress;         
          $this->save();            
    }
    
    //связи
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
