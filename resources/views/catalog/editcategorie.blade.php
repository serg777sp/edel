@extends('layouts.adminmain')

@section('left')
 <div class='catalog_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> {{$cat->name}}</div>
        <div class="panel-body"> 
            <form class='form' method='post' action="{{ url('admin/catalog/edit/categorie') }}/{{$cat->id}}">
            {!! csrf_field() !!}
                <label>Новое Имя категории:</label>
                <input class="form-control" type='text' name='name' value="{{$cat['name']}}">
                <label>Новое описание категории:</label>
                <textarea class="form-control" name='description'>{{$cat['description']}}</textarea>
                      <div class='valerr'>
                          @if (count($errors) > 0)
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                          @endif
                      </div>    
                <div>
                    <button class="btn btn-success" type='submit'>Сохранить изменения</button>
                </div>  
            </form>
        </div>
    </div>    
 </div>
@endsection
@section('right')
@include('blocks.catalog_options')
@endsection