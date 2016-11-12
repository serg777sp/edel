<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    //название таблицы в бд
    protected $table='subcategories';
    
    //Поля разрешенные к массовому заполнению
    protected $fillable = ['name','description','categorie_id'];
    
    //Метод создание новой подкатегории
    public static function create(array $attributes = array()) {
        unset($attributes['_token']);
//        dd($attributes);
        return parent::create($attributes);
    }

    //Обновление подкатегории
    public function update(array $attributes = array(), array $options = array()) {
        unset($attributes['_token']);
//        dd($attributes);
        return parent::update($attributes, $options);
    }
    
    //связи
    public function categorie()
    {
        return $this->hasOne('App\Models\Categorie');
    }
}
