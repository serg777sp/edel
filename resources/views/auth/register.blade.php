@extends('layouts.main')

@section('left')
 <div class='login_box'>
  <form class='form' method="POST" action="{{ url('/register') }}">
  {!! csrf_field() !!}
  <div>
    Ваше Имя:<br>
    <input type="text" name="name" value="{{ old('name') }}">
  </div>
  <div>
    Email:<br>
    <input type="email" name="email" value="{{ old('email') }}">
  </div>
  <div>
    Пароль:<br>
    <input type="password" name="password" id="password">
  </div>
    <div>
    Подтверждение пароля:<br>
    <input type="password" name="password_confirmation" id="password_confirmation">
  </div>
  <div>
    <button type="submit">Зарегистрироваться</button>
  </div>
</form>
</div>
@endsection
@section('right')

@endsection