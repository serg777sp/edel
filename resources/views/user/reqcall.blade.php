@extends('layouts.main')

@section('left')
    <div class="order_box center">
        <h3>Заказ звонка</h3>
        <hr>
        <form class='form' method='post' action="{{ url('/reqcall') }}">
            <div>
                Имя:
                <input type='text' name='guest_name' placeholder="Ваше имя">
            </div>
            <div>   
                Телефон (моб.):
                <input type='text' name='guest_phone' placeholder="Контактный телефон">
            </div>  
            <button type='submit' name='submit' value="true">Заказать</button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
@section('right')
 тут блоки пока хз что 
@endsection