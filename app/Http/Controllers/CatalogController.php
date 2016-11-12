<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Categorie;
use App\Models\Subcategorie;

class CatalogController extends Controller
{
    //метод добавления Категорий
    public function addCategorie()
    {
        $data =[
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Добавление новой категории'
        ];
   // dd($data);    
    return view('catalog.addcategorie',$data);    
    }
    //Метод редактирования Категорий
    public function editCategorie($id)
    {
        $categorie = Categorie::find($id);
        $data =[
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Редактирование категории - '.$categorie->name,
            'cat' => $categorie
        ];
  //  dd($data);    
    return view('catalog.editcategorie',$data);    
    }
    //метод удаления категорий
    public function destroycategorie($id)
    {
        $cat = Categorie::find($id);
        $mess = 'Категория'.$cat->name.' удалена';
        $cat->complexDelete();
//        $cat->delete();
    return redirect()->back()->with('message',$mess);    
    }
    //Метод добавления подкатегорий
    public function addSubcategorie()
    {
        $data =[
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Добавление новой подкатегории - заполните форму',
            'categories' => Categorie::all()->toArray(), 
        ];
   // dd($data);    
    return view('catalog.addsubcategorie',$data);    
    }
    //Метод редактирования подкатегорий
    public function editSub($id)
    {
        $sub = Subcategorie::find($id);
        $data =[
            'title' => 'Администраторская - Эдельвейс - цветочный салон',
            'page_title' => 'Редактирование подкатегории - '.$sub->name,
            'sub' => $sub,
            'categories' => Categorie::all()->toArray()
        ];
 //   dd($data);    
    return view('catalog.editsubcategorie',$data);    
    }
    //метод удаления подкатегорий
    public function destroysub($id)
    {
    $sub = Subcategorie::find($id);
    $mess = 'Подкатегория'.$sub['name'].' удалена';
    $sub->delete();
    return redirect()->back()->with('message',$mess);    
    }
    //Валидация данных для создания новых категорий
    public function createCategorie(Request $request)
    {
        $this->validate($request, [
               'name' => 'string|required|max:255',
               'desc' => 'string|max:500',
        ]);
        Categorie::create($request->all());
    return redirect('/admin/catalog')->with('message','Категория создана');    
    }
    //Валидация данных для создания новых подкатегорий
    public function createSub(Request $request)
    {
        $this->validate($request, [
               'name' => 'string|required|max:255',
               'desc' => 'string|max:500',
        ]);
        Subcategorie::create($request->all());
    return redirect('/admin/catalog')->with('message','Подкатегория создана');    
    }
    public function saveCategorie(Request $request, $id)
    {
        $this->validate($request, [
               'name' => 'string|max:255',
               'desc' => 'string|max:500',
        ]);
        $cat = Categorie::find($id);
        $cat->update($request->all());
//        dd($cat);
    return redirect('/admin/catalog')->with('message','Категория '.$cat->name.' изменена');     
    }
    public function saveSub(Request $request,$id)
    {
        $this->validate($request, [
               'name' => 'string|max:255',
               'desc' => 'string|max:500',
        ]);
        $sub = Subcategorie::find($id);
        $sub->update($request->all());
//        dd($sub);
    return redirect('/admin/catalog')->with('message','Подкатегория '.$sub->name.' изменена');    
    }

}