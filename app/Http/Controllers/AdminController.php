<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Models\Item; use App\Models\OrderItem; use App\Models\Categorie;
use App\Models\Order; use App\Models\Setting; use App\Models\ReqCall;
use App\User; use Hash; use App\Models\SmsSender; use App\Models\Adresat;

class AdminController extends Controller
{
    //метод вывода главной админки
    public function index()
    {
        $data =[
            'title' => 'Админка Эдельвейс',
            'page_title' => 'Администрирование магазина',
            'neoplat_count' => Order::all()->where('status',1)->count(),
            'active_count' => Order::all()->where('status',2)->count(),
            'of_count' => Order::all()->where('status',0)->count(),
            'orders' => Order::all()->where('status',2),
            'sets' => Setting::getSet(),
            'reqcalls_count' => ReqCall::all()->count(),              
        ];
    //    dd($data);
        return view('admin.index',$data);
    }
    //метод вывода товаров витрины для редактирования
    public function showcase()
    {
        $data = [
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Работа с витриной магазина',
            'sets' => Setting::getSet(), 
            'items' => Item::all()->toArray() ,
            'catalog' => Categorie::catalog(),
        ];
       //  dd($items);
        return view('admin.showcase',$data);
    }
    //метод вывода каталога для редактирования
    public function catalog()
    {
        $data = [
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Управление каталогом магазина',
            'sets' => Setting::getSet(), 
            'catalog' => Categorie::catalog(),
        ];
       // dd($data);
        return view('admin.catalog',$data);
    }
    //метод вывода списка пользователей для редактирования
    public function showusers()
    {
       $data = [
           'title' => 'Администраторская - Эдельвейс - цветочный салон',
           'page_title' => 'Работа с пользователями',
           'sets' => Setting::getSet(), 
           'users' => User::all(),
       ];
    //   dd($data);
       return view('admin.showusers',$data);    
    }
    
    public function userEdit($id){
        $user = User::find($id);
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Пользователь - '.$user->getFIO(),
            'sets' => Setting::getSet(),
            'user' => $user
        ];
      //  dd($data);
    return view('admin.showuser',$data);  
    }
    //метод просмотра всех заказов
    public function showOrders(Request $req)
    {
//        dd($req->all());
        $data = [
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Работа с заказами',
            'sets' => Setting::getSet(), 
            'catalog' => Categorie::catalog(),
            'orders' => Order::getSortQuery($req)->paginate(10)->appends($req->all()), 
        ];
   // dd($data);    
    return view('admin.showorders',$data);         
    }
    //Метод просмотра и изменения настроек
    public function settings()
    {
        $data = [
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Настройки магазина',
            'sets' => Setting::getSet(), 
            'settings' => Setting::all(),
        ];
        //dd($data);        
    return view('admin.settings',$data);    
    }
    //Метод изменения настроек
    public function set_update(Request $req)
    {
       $set = Setting::find($req->input('set_id'));
       $set->val = $req->input('val');
       $set->save();
    return redirect()->back()->with('message','Настройки изменены');          
    }
    //метод просмотра заказанных звонков
    public function ReqCallShow(){
       $data = [
           'title' => 'Администраторская - Эдельвейс - цветочный салон',
           'page_title' => 'Просмотр заказанных звонков',
           'reqcalls' => ReqCall::paginate(10),
       ];
    //   dd($data);
       return view('admin.reqcallshow',$data);          
    }
    //метод удаления заканных звонков
    public function ReqCallDel($id){
        $req = ReqCall::find($id);
        $req->delete();
        return redirect()->back()->with('message','Заказ звонка удален');
    }
    
    public function addUserAdresat(Request $request,$id){
        $user = User::find($id);
        $this->validate($request, [
             'name' => 'required|string|max:255',
             'surname' => 'required|string|max:255',
             'phome' => 'digits:11',
             'adress' => 'max:255',
        ]);
        $adresat = new Adresat();
        $adresat->NewAdresat($request,$user);
       return redirect()->back()->with('message','Адресат добавлен');
    }
    
    public function userDel(){
        return redirect()->back()->with('message','Не работает(еще не сделал)');
    }

        public function editUserProfile(Request $request,$id){
        $this->validate($request, [
             'name' => 'string|max:255',
             'surname' => 'string|max:255',
             'phome' => 'digits:11',
             'adress' => 'max:255',
        ]);
        
        $user = User::find($id);
        $user->updateProfile($request);  
    
       return redirect()->back()->with('message','личные данные обновлены');  
    }
    
    public function editUserPass(Request $request,$id){
        $user = User::find($id);
        $this->validate($request, [
             'password' => 'required|min:6|confirmed',
        ]);
        $mes = $user->editPass($request);
        return redirect()->back()->with('message',$mes);
    }
}
