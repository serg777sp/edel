<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Models\Order; use App\Models\OrderItem; use App\Models\Adresat;
use App\Models\Basket; use App\Models\Categorie; use App\User;
use App\Models\Item; use App\Models\Setting; use App\Models\SmsSender;
use Auth;
class OrderController extends Controller
{
    //метод просмотра заказа
    public function show(Request $req,$id)
    {
        $order = Order::find($id);
        if($req->ajax()){
            return $order->getModalWindow();
        }
        if($order->adresat_id>0)$adresat=Adresat::find($order->adresat_id);
        if($order->adresat_id==0)$adresat=Adresat::all()->first();
        $data = [
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Просмотр заказа',
            'catalog' => Categorie::catalog(),
            'order' => $order,
            'sets' => Setting::getSet(),   
        ];
        $data['item_count'] = 0;
        if(Auth::check())$data = Basket::getBasketVars($data,Auth::user()->id); 
   //dd($data);        
    return view('admin.showorder',$data);    
    }
    //Метод первого шага оформления заказа
    public function stepone(Request $request)
    {
        if(empty($request->order_id)){
           $order = Order::NewOrder(Auth::user());
        } else {
           $order = Order::find($request->order_id); 
        }
        $data = [
           'title' => 'Эдельвейс - цветочный салон',
           'page_title' => 'Оформление заказа - шаг первый - Выбор получателя',
           'order' => $order, 
           'catalog' => Categorie::catalog(),       
           'sets' => Setting::getSet(),
       ];
       $data = Basket::getBasketVars($data,Auth::user()->id);
    //   dd($data);
       return view('basket.stepone',$data); 
    }
    //Метод второго шага оформления заказа
    public function steptwo(Request $request)
    {
        $order = Order::find($request->order_id);
       // dd($request);
        if($order->step === 1){
            $order->setStepOneValues($request);
        }           
        $data = [
            'title' => 'Эдельвейс - цветочный салон',
            'page_title' => 'Оформление заказа - шаг второй - Куда и когда',
            'order' => $order,
            'catalog' => Categorie::catalog(),       
            'sets' => Setting::getSet(),   
        ];
        $data = Basket::getBasketVars($data,Auth::user()->id);
     //  dd($data);
        return view('basket.steptwo',$data);   
    }
    //Метод третьего шага оформления заказа
    public function stepthree(Request $request)
    {
        $order = Order::find($request->order_id);
        if($order->step === 2){
            $order->setStepTwoValues($request);
        }
//        dd($request->all(),$order);                
        $data = [
            'title' => 'Эдельвейс - цветочный салон',
            'page_title' => 'Оформление заказа - шаг третий - Контактные телефоны',
            'order' => $order,
            'catalog' => Categorie::catalog(),        
            'sets' => Setting::getSet(),
        ];
        $data = Basket::getBasketVars($data,Auth::user()->id);
    //   dd($data);
        return view('basket.stepthree',$data); 
    }
    //Метод третьего шага оформления заказа
    public function stepfour(Request $request)
    {
        $order = Order::find($request->order_id);
//        dd($request->all(),$order);
        if($order->step === 3){
            $order->setStepThreeValues($request);
        }       
        $data = [
            'title' => 'Эдельвейс - цветочный салон',
            'page_title' => 'Оформление заказа - шаг четвертый - Подтверждение данных',
            'order' => $order,
            'catalog' => Categorie::catalog(),     
            'sets' => Setting::getSet(),  
        ];
        $data = Basket::getBasketVars($data,Auth::user()->id);
    //   dd($data);
       return view('basket.stepfour',$data);  
    }
    //Метод Обновления заказа перед подтверждением
    public function confimUpdate(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->editStepsValues($request);
//     dd($request->all(),$order);
        return redirect()->back()->with('message','Данные изменены');     
    }
    //Заключительный метод оформления заказа
    public function finish(Request $request)
    {
        $order = Order::find($request->order_id);
        if($order->step === 4){
            $order->stepFinish();
        }    
        $data = [
           'title' => 'Эдельвейс - цветочный салон',
           'page_title' => 'Оформление заказа - завершение - оплата',
           'order' => $order,
           'catalog' => Categorie::catalog(),
           'sets' => Setting::getSet(),      
        ];
        $data = Basket::getBasketVars($data,Auth::user()->id);
    return view('basket.finish',$data); 
    }
    
    public function getSortOrders(Request $request){
//        $orderType = $request->orderType;
        $query = Order::getSortQuery($request);
      // $orderType = $_POST['orderType'];
        $data['orders'] = $query->paginate(5);
        $userModel = new User();
        $data['userModel'] = $userModel;
//        dd($data);
        return view('blocks.sortOrders',$data);
    }
    
    public function getEditItemModal(Request $request){
        $orderItem = OrderItem::find($request->id);
        return $orderItem->getEditModal();
    }


}
