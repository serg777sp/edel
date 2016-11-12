<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategorie;

class Categorie extends Model
{
    //название таблицы в бд
    protected $table='categories';
    
    //Поля разрешенные к массовому заполнению
    protected $fillable = ['name','description'];
    
    //Метод создания новой категории
    public static function create(array $attributes = array()) {
        unset($attributes['_token']);
//        dd($attributes);
        return parent::create($attributes);
    }
    
    //Метод обновления категорий
    public function update(array $attributes = array(), array $options = array()) {
        unset($attributes['_token']);
//        dd($attributes);
        return parent::update($attributes, $options);
    }
    //Метод удаления 
    public function complexDelete() {
        foreach ($this->subs()->get() as $sub){
            $sub->delete();
        }
        $this->delete();
    }
    
    //Метод получения всего каталога
    public static function catalog()
    {
        $catalog['cat-s'] = Categorie::all();
        $catalog['sub-s'] = Subcategorie::all()->toArray();
        return $catalog;
    }
    
    //Получения количества подкатегорий
    public function subsCount(){
        return count($this->subs()->get());
    }
    
    //связи
    public function subs()
    {
        return $this->hasMany('App\Models\Subcategorie');
    }
}
