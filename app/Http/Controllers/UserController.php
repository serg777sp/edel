<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Item; use App\Models\Itemprop; use App\Models\Order; use App\Models\OrderItem;
use App\Models\Adresat; use App\Models\Setting; use App\Models\Basket;
use App\Models\Propertie; use App\Models\ReqCall;
use App\Models\Categorie; use Illuminate\Support\Facades\Hash;

use Auth;

class UserController extends Controller
{
    //Метод первой страницы
    public function welcome(Request $req)
    {
        $query = Item::getSortQuery($req);
        $data =[
            'items' => $query->paginate(18),
            'sql' => $query->toSql(),
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Главная',
            'sets' => Setting::getSet(),
            'catalog' => Categorie::catalog(),
        ];
        $data['item_count'] = 0;
        if(Auth::check())$data = Basket::getBasketVars($data,Auth::user()->id); 
//       dd($data);
        return view('wel',$data);
    }

    //метод главной личного кабинета
    public function cabinet()
    {
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Личный кабинет - '.Auth::user()->getFIO(),
            'sets' => Setting::getSet(),
            'summs' => OrderItem::getAllSumms(Auth::user()->id),                  
        ];
        if(Auth::check())$data = Basket::getBasketVars($data,Auth::user()->id); 
      //  dd($data);
    return view('user.cabinet',$data);        
    }
    public function oplata(){
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Все об оплате',  
            'sets' => Setting::getSet(),               
        ];
        if(Auth::check()){
            $data = Basket::getVar($data,Auth::user()->id);
        }    
   // dd($data);
    return view('user.oplata',$data);           
    }
    public function dostavka(){
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Все о доставке',  
            'sets' => Setting::getSet(),               
        ];
        if(Auth::check())$data = Basket::getVar($data,Auth::user()->id);
   // dd($data);
    return view('user.dostavka',$data);           
    }
    public function working(){
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Условия работы',  
            'sets' => Setting::getSet(),               
        ];
        if(Auth::check())$data = Basket::getVar($data,Auth::user()->id);
   // dd($data);
    return view('user.working',$data);           
    }
    public function garant(){
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Гарантии',  
            'sets' => Setting::getSet(),               
        ];
        if(Auth::check())$data = Basket::getVar($data,Auth::user()->id);
   // dd($data);
    return view('user.garant',$data);           
    }
    public function about(){
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'О нас',  
            'sets' => Setting::getSet(),               
        ];
        if(Auth::check())$data = Basket::getVar($data,Auth::user()->id);
   // dd($data);
    return view('user.about',$data);           
    }
    //метод обновления личных данных
    public function update(Request $request)
    {
        $this->validate($request, [
             'name' => 'string|max:255',
             'surname' => 'string|max:255',
             'phome' => 'digits:11',
             'adress' => 'max:255',
        ]);
        
          $user = Auth::user();
          if(!empty($request->input('name')))$user->name = $request->input('name');
          if(!empty($request->input('surname'))) $user->surname = $request->input('surname');
          if(!empty($request->input('phone')))$user->phone = $request->input('phone');
          if(!empty($request->input('adress')))$user->adress = $request->input('adress');         
          $user->save();
    
       return redirect('/cabinet')->with('message','личные данные обновлены');          
    }
    //метод изменения пароля
    public function passEdit(Request $request){
       // dd($request->all());
        $user = Auth::user();
        $this->validate($request, [
             'oldpass' => 'required|min:6',
             'password' => 'required|min:6|confirmed',
        ]);        
        if(Hash::check($request->oldpass, Auth::user()->password)){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('message','Пароль изменен'); 
        }else{
            return redirect()->back()->with('message','Изменение пароля отклонено, введен неверный пароль'); 
        }        
    }
    //метод заказа звонка
    public function ReqCall(Request $request){
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Заказ звонка',  
            'sets' => Setting::getSet(),               
        ];
        $data['item_count'] = 0;
        if(!empty($request->input('submit'))){
          //  dd($request);
            $this->validate($request, [
                'guest_name' => 'string|required|max:255',
                'guest_phone' => 'digits:11|required',
            ]);
            $req = new ReqCall;
            $req->SaveModel($request->input('guest_name'),$request->input('guest_phone'));
            return redirect('/')->with('message','Заказ звонка принят');          
        }
        if(Auth::check()){
            $data = Basket::getBasketVars($data,Auth::user()->id);
        }    
   // dd($data);
    return view('user.reqcall',$data);          
    }

    
}
