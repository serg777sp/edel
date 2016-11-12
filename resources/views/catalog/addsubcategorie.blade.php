@extends('layouts.adminmain')

@section('left')
 <div class='catalog_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Заполните форму</div>
        <div class="panel-body"> 
            @if(!empty($categories))
            <form class='form' method='post' action="{{ url('admin/catalog/subcategorie/create') }}">
            {!! csrf_field() !!}
                <label>Имя новой подкатегории:</label>
                <input class="form-control" type='text' name='name' placeholder="Имя подкатегории">
                <label>Выбирите категорию к которой относится подкатегория:</label>
                <select class="form-control" name='categorie_id'>
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie['id'] }}">{{ $categorie['name'] }}</option>
                    @endforeach
                </select>
                <label>Описание подкатегории:</label>
                <textarea class="form-control" name='description'></textarea>
                <div class='valerr'>
                    @if (count($errors) > 0)
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    @endif
                </div>    
                <button class="btn btn-success" type='submit'>Добавить подкатегорию</button>
            </form>
            @else
                Нет созданных категорий
            @endif
        </div>
    </div>    
 </div>
@endsection
@section('right')
@include('blocks.catalog_options')
@endsection