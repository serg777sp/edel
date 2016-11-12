@extends('layouts.main')

@section('left')
<div class='login_box'>
  <form class='form' method="POST" action="{{ url('/login') }}">
  {!! csrf_field() !!}
  <div>
    Email:<br>
    <input type="email" name="email" value="{{ old('email') }}">
  </div>
  <div>
    Пароль:<br>
    <input type="password" name="password" id="password">
  </div>
    <input type="checkbox" name="remember"> Запомнить меня<br>
  <div>
    <button type="submit">Войти</button>
  </div>
</form>
</div>
@endsection
@section('right')

@endsection