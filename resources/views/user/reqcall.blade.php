@extends('layouts.main')

@section('left')
<div class="box-500 center">
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> Заказ звонка</div>
        <div class="panel-body"> 
            <form class='form' method='post' action="{{ url('/reqcall') }}">
                <div>
                    <label>Имя:</label>
                    <input class="form-control" type='text' name='guest_name' placeholder="Ваше имя">
                </div>
                <div>   
                    <label>Телефон (моб.):</label>
                    <input class="form-control" type='text' name='guest_phone' placeholder="Контактный телефон">
                </div>  
                <button class="btn btn-success" type='submit' name='submit' value="true">Заказать</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>
    </div>    
</div>
@endsection
@section('right')
 тут блоки пока хз что 
@endsection