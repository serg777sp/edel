<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Basket; use App\Models\Order;
use App\Models\Adresat; use App\Models\Setting;
use App\Models\Propertie;
use App\Models\Categorie;
use App\Models\Item; use App\Models\Itemprop; use Auth;

class BasketController extends Controller
{
    //Метод добавления новой записи в таблицу basket AJAX
    public function ajaxAdd()
    {
       if(!empty($_POST['user_id']))$user_id = $_POST['user_id'];
       if(!empty($_POST['item_id']))$item_id = $_POST['item_id'];
       if(!empty($_POST['razmer']))$razmer = $_POST['razmer'];
       if(!empty($_POST['dlina']))$dlina = $_POST['dlina'];
       if(!empty($_POST['kolvo']))$kolvo = $_POST['kolvo']; 	
       $item = Item::find($item_id);
       $basket = new Basket;    
       if($item->viewtype==0)$basket->NewBasket($user_id,$item_id,1,$razmer);
       if($item->viewtype==1)$basket->NewBasket($user_id,$item_id,$kolvo,$dlina);
       $summa = Basket::getSumma(Basket::all()->where('user_id',(int)$user_id));
       $data = [
           'item_count' => Basket::all()->where('user_id',(int)$user_id)->count(),
           'summa' => $summa,
       ];
       return view('basket.box',$data);
    }
    //Метод для просмотра корзины
    public function show()
    {
        $data = [
            'title' => 'Эдельвейс - цветочный салон',
            'page_title' => 'Просмотр корзины - оформление',
            'catalog' => Categorie::catalog(),
            'sets' => Setting::getSet(),
        ];
        $data['item_count'] = 0;
        if(Auth::check())$data = Basket::getBasketVars($data,Auth::user()->id);    
      //  dd($data);
        return view('basket.index',$data);
    }
    //Метод удаления товаров из корзины
    public function delete($basket_id)
    {
       $basket = Basket::find($basket_id);
       $basket->delete();
       return view('basket.table'); 
    }
    //Метод очистки корзины
    public function clearBasket(){
        foreach (Auth::user()->baskets as $basket){
            $basket->delete();
        }
        return redirect('/')->with('message','Корзина очищена =(');
    }

}
