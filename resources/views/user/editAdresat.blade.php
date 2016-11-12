@extends('layouts.main')

@section('left')
<div class="order_box center">
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Редактирование адресата</div>
        <div class="panel-body">
            <form class='form' method='post' action="{{ url('cabinet/adresat/edit') }}">
                <label>Имя Получателя:</label>
                <input class="form-control" type='text' name='name' value="{{$adresat->name}}"> 
                <label>Фамилия Получателя:</label>
                <input class="form-control" type='text' name='surname' value="{{$adresat->surname}}">
                <label>Телефон (моб.):</label>
                <input class="form-control" type='text' name='phone' value="{{$adresat->phone}}"> 
                <label>Адрес:</label>
                <textarea class="form-control" name='adress'>{{$adresat->adress}}</textarea> 
                <button class="btn btn-success" type='submit'>Сохранить изменения</button>
                <a href="{{ url('/cabinet')}}">
                    <button type="button" class="btn btn-warning">Назад</button>
                </a>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="adresat_id" value="{{$adresat->id}}">
            </form>
        </div>
    </div>    
</div>
@endsection
@section('right')
 @include('blocks.cabinet_option')
@endsection