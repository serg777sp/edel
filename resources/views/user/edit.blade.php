@extends('layouts.main')

@section('left')
                 <div class="order_box">
                <h3>Редактирование личных данных</h3>
                <hr>
                <form class='form' method='post' action="{{ url('cabinet/edit') }}">
                <div>
                    Имя:
                    <input type='text' name='name' placeholder="{{Auth::user()->name}}">
                 </div>
                 <div>   
                    Фамилия:
                    <input type='text' name='surname' placeholder="{{Auth::user()->surname}}">
                 </div>
                 <div>   
                    Телефон (моб.):
                    <input type='text' name='phone' placeholder="{{Auth::user()->phone}}">
                 </div> 
                 <div>  
                    Адрес:<br>
                    <textarea name='adress'>{{Auth::user()->adress}}</textarea>
                 </div>   
                    <button type='submit'>Сохранить</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
                </div>
@endsection
@section('right')
 @include('blocks.cabinet_option')
@endsection