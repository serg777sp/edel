@extends('layouts.adminmain')

@section('left')
 <div class='catalog_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Заполните форму</div>
        <div class="panel-body">      
            <form class='form' method='post' action="{{ url('admin/catalog/categorie/create') }}">
            {!! csrf_field() !!}
                <label>Имя новой категории:</label>
                <input class="form-control" type='text' name='name' placeholder="Имя категории">
                <label>Описание категории:</label>
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
                <div>
                    <button class="btn btn-success" type='submit'>Добавить категорию</button>
                </div>
            </form>
        </div>
    </div>    
 </div>
@endsection
@section('right')
@include('blocks.catalog_options')
@endsection