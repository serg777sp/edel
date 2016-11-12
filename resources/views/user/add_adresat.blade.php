@extends('layouts.main')

@section('left')
                 <div class="order_box">
                <h3>Заполните форму</h3>
                <hr>
                <form class='form' method='post' action="{{ url('cabinet/adresat/add') }}">
                <div>
                    Имя Получателя:
                    <input type='text' name='name'>
                 </div>
                 <div>   
                    Фамилия Получателя:
                    <input type='text' name='surname'>
                 </div>
                 <div>   
                    Телефон (моб.):
                    <input type='text' name='phone'>
                 </div> 
                 <div>  
                    Адрес:<br>
                    <textarea name='adress'></textarea>
                 </div>   
                    <button type='submit'>Добавить получателя</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
                </div>
@endsection
@section('right')
 @include('blocks.cabinet_option')
@endsection