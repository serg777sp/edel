<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; use Auth;
use App\Models\Adresat; use App\Models\Setting;
use App\Models\Basket;

class AdresatController extends Controller
{
    //метод сохранения адресата
    public function save(Request $request)
    {
        $this->validate($request, [
             'name' => 'required|string|max:255',
             'surname' => 'required|string|max:255',
             'phone' => 'required|max:20',
             'adress' => 'max:255',
        ]);
        $adresat = new Adresat;
        $adresat->NewAdresat($request);
       return redirect('/cabinet')->with('message','Адресат добавлен');
    }
    //Метод редактирования адресатов
    public function edit($adresat_id)
    {
        $data = [
            'title' => 'Эдельвейс | служба доставки цветов',
            'page_title' => 'Личный кабинет - редактирование получателя',
            'adresat' => Adresat::find($adresat_id),
            'sets' => Setting::getSet(),                
        ];
    $data = Basket::getBasketVars($data,Auth::user()->id);     
    return view('user.editAdresat',$data);
    }
    //Метод обновления адресата
    public function update(Request $request)
    {
        $this->validate($request, [
             'name' => 'string|max:255',
             'surname' => 'string|max:255',
             'phome' => 'digits:11',
             'adress' => 'max:255',
        ]);
        $adresat = Adresat::find($request->adresat_id);
        $adresat->UpdateAdr($request);
       return redirect('/cabinet')->with('message','Данные адресата изменены');  
    }
    //Метод удаления адресатов
    public function del($adresat_id)
    {
        $adresat = Adresat::find($adresat_id);
        $adresat->delete();       
    return redirect('/cabinet')->with('message','Адресат удален');    
    }
}
