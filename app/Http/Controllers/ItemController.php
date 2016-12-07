<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Item;
use App\Models\Itemprop; Use App\Models\Setting;
use App\Models\Categorie; use App\Models\Basket;
use App\Models\Subcategorie;
use Storage; use Auth;

class ItemController extends Controller
{
    //Метод  добавления нового букета
    public function createbuket(Request $request)
    {
        if($request->method() === 'GET'){
            $data = [
                'title' => 'Администраторская - Эдельвейс - цветочный салон',
                'page_title' => 'Добавление нового Букета',
                'cats' => Categorie::all(),
                'sets' => Setting::getSet(),
                'old' => $request,
            ];
//            dd($request->old());
            $data['item_count'] = 0;
        }
        if($request->method() === 'POST'){
//            dd($request->all());
            try {
                $validator = Validator::make($request->all(), [
                    'foto' => 'image|required',
                    'name' => 'required|string|max:30',
                    'price' => 'required|numeric|digits_between:0,99999.99',
                    'size'=> 'required|numeric|digits_between:0,200',
                    'description' => 'required|string',
                ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $validator2 = Validator::make(['image' => $request->foto->getClientOriginalName()], [ 'image' => 'unique:item_props,img_url']);
                if($validator2->fails()){
                    return redirect()->back()->withErrors($validator2)->withInput();
                }
                $mess = Item::newBuket($request);
            } catch (Exception $e){
                //dd($e);
                $mess = $e->getMessage();
            }

            return redirect('/admin/showcase')->with('message',$mess);
        }
      //  dd($data);
        return view('item.addbuket',$data);
    }
    //Метод  добавления штучного товара
    public function createFlower(Request $request)
    {
	if($request->method() === 'GET'){
    	    $data = [
        	'title' => 'Администраторская - Эдельвейс - цветочный салон',
        	'page_title' => 'Добавление нового штучного товара',
        	'cats' => Categorie::all()->toArray(),
        	'subs' => Subcategorie::all()->toArray(),
        	'sets' => Setting::getSet(),
    	    ];
	}
	if($request->method() === 'POST'){
	    try{
		$validator = Validator::make($request->all(),[
            	    'foto' => 'image|required',
            	    'name' => 'required|string|max:255',
            	    'price' => 'required|numeric|digits_between:0,99999.99',
            	    'size'=> 'required|numeric|digits_between:0,120',
            	    'description' => 'required|string',
    		]);
		if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $validator2 = Validator::make(['image' => $request->foto->getClientOriginalName()], [ 'image' => 'unique:item_props,img_url']);
                if($validator2->fails()){
                    return redirect()->back()->withErrors($validator2)->withInput();
                }
                $mess = Item::newFlower($request);

	    } catch (Exception $e){
		$mess = $e->getMessage();
	    }
//	    dd('before redirect');
	    return redirect()->back()->with('message',$mess);
	}
        $data['item_count'] = 0;
//        dd($data);
        return view('item.addsingle',$data);
    }
    //Метод сохранения в базу нового штучного товара
    public function storesingle(Request $request)
    {
       $item = Item::newSingle($request);
       Itemprop::createNewProp('цена+длина',$request->input('price'),$request->input('dlina'),$item->id);
       Itemprop::createNewProp('фото',$request->file('foto')->getClientOriginalName(),0,$item->id);
       $mess = 'Штучный товар '.$item->name.' создан!';
       return redirect('/admin/showcase')->with('message',$mess);
    }
    public function storeEdit(Request $request)
    {
    //Метод обновления основных данных товаров
       $item = Item::find($request->input('item_id'));

       if(!empty($request->input('name')))$item->name = $request->input('name');
       if(!empty($request->input('description')))$item->description = $request->input('description');
       if(!empty($request->input('cat')))$item->cat_id = $request->input('cat');
       if(!empty($request->input('sub')))$item->sub_id = $request->input('sub');
       $item->save();

       return redirect()->back()->with('message','Данные обновлены');
    }
    public function show($id)
    {
        //
        $item = Item::find($id);
        $data = [
           'title' => 'Эдельвейс - цветочный салон',
           'page_title' => 'Просмотр товара '.$item['name'],
           'catalog' => Categorie::catalog(),
           'item' => $item,
           'sets' => Setting::getSet(),
        ];
        $data['item_count'] = 0;
//        dd($data);
        return view('item.show',$data);
    }
//
    //Метод редактирования существующих товаров
    public function edit($id)
    {
        $item = Item::find($id);
//        $props = Itemprop::all()->where('item_id',$item['id'])->toArray();
        $data = [
           'title' => 'Администраторская - Эдельвейс - цветочный салон',
           'page_title' => 'Редактирование товара '.$item['name'],
           'item' => $item,
//           'props'=> $props,
           'imgs'=> $item->getPhotos(),
           'prices'=> $item->getPrices(),
           'cats' => Categorie::all(),
           'subs' => Subcategorie::all()->toArray(),
           'sets' => Setting::getSet(),
        ];
        $data['item_count'] = 0;
//        dd($data);
        return view('item.edit',$data);
    }
    //Метод добавления фоток к товарам
    public function addphoto(Request $request)
    {
    $mess = Item::addphoto($request);
    return redirect()->back()->with('message',$mess);
    }
    //Метод обновления фоток к товарам
    public function updatephoto(Request $request)
    {
    $mess = Item::updatephoto($request);
    return redirect()->back()->with('message',$mess);
    }
    //Метод вывода поддверждения удаления товара
    public function delete($id)
    {
        $item = Item::find($id);
        $data = [
           'title' => 'Администраторская - Эдельвейс - цветочный салон',
           'page_title' => 'удаление товара '.$item['name'],
           'item' => $item,
           'price'=> Itemprop::all()->where('item_id',$item['id'])->toArray(),
           'sets' => Setting::getSet(),
        ];
        $data['item_count'] = 0;
//        dd($item->baskets);
      return view('item.delete',$data);
    }
    //Метод удаления товара
    public function destroy($id)
    {
        //
        $item = Item::find($id);/*
        if(Storage::disk('public')->exists('/img/small/'.$item->url))
        {
           Storage::disk('public')->delete('/img/small/'.$item->url);
        }
        if(Storage::disk('public')->exists('/img/original/'.$item->url))
        {
           Storage::disk('public')->delete('/img/original/'.$item->url);
        }  */
        $props = Itemprop::all()->where('item_id',$item->id);
        foreach($props as $prop)
        {
            if(!empty($prop->imgurl))
            {
               if(Storage::disk('public')->exists('/img/original/'.$prop->imgurl))
               {
                  Storage::disk('public')->delete('/img/original/'.$prop->imgurl);
               }
            }
            $prop->delete();
        }
//        foreach ($item->){
//
//        }
        $item->delete();
        $mess = $item->name.' Удален из базы';

        return redirect('/admin/showcase')->with('message',$mess);
    }
    //Метод редактирования цен
    public function editprice(Request $request,$viewtype)
    {
        $mess = Item::editprice($request,$viewtype);
    return redirect()->back()->with('message',$mess);
    }
    public function delprice($value,$item_id)
    {
        $item = Item::find($item_id);
        $props = Itemprop::all()->where('item_id',$item->id);
        foreach ($props as $prop) {
            if($prop->razmer==$value || $prop->dlina==$value)$prop->delete();
        }
    return redirect()->back()->with('message','Цена удалена');
    }

    public function checkEdit(Request $request)
    {
        //Тут будет валидация
        $this->validate($request, [
               'name' => 'string|max:255',
               'description' => 'string',
     ]);
    return $this->storeEdit($request);
    }

    public function ganerate(){
        //генерация 10 товаров
       $item = new Item();
       if($item->generate(10)){
            return redirect('/admin/showcase')->with('message','Создано 10 случайных товаров');
       }
    }

    public function sortByCat(Request $request){
//        $query = Item::getSortQuery($request);
        $query = Item::getSortQuery($request);
        $data['sql'] = $query->toSql();
        $data['items'] = $query->paginate(18);
        $data['request'] = $request->all();
//        $data['buk_prices'] = Itemprop::where('name','цена+размер')->orderBy('price', 'asc')->get()->toArray();
//        $data['sin_prices'] = Itemprop::where('name','цена+длина')->orderBy('price', 'asc')->get()->toArray();
//        dd($data);
        return view('blocks.items',$data);
    }
}
