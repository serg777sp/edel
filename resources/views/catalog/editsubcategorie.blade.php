@extends('layouts.adminmain')

@section('left')
 <div class='catalog_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> {{$sub->name}}</div>
        <div class="panel-body">  
            <form class='form' method='post' action="{{ url('admin/catalog/edit/subcategorie') }}/{{$sub->id}}">
            {!! csrf_field() !!}
            <label>Новое имя подкатегории:</label>
            <input class="form-control" type='text' name='name' value="{{$sub['name']}}">
            <label>Категория к которой относится подкатегория</label>
            <select class="form-control" name='categorie_id'>
                @foreach($categories as $categorie)
                   @if($categorie['id'] == $sub['categorie_id'])
                      <option value="{{ $categorie['id'] }}" selected>{{ $categorie['name'] }}</option>
                   @else
                      <option value="{{ $categorie['id'] }}">{{ $categorie['name'] }}</option>
                   @endif                   
                @endforeach
            </select>
            <label>Описание подкатегории:</label>
            <textarea class="form-control" name='description'>{{$sub['description']}}</textarea>
                <div class='valerr'>
                    @if (count($errors) > 0)
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    @endif
                </div>    
            <button class="btn btn-success" type='submit'>Сохранить изменения</button>
            </form>
        </div>
    </div> 
 </div>
@endsection
@section('right')
@include('blocks.catalog_options')
@endsection