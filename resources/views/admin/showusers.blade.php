@extends('layouts.adminmain')

@section('left')
  <table class='tb_users'>
      <tr class='tb_h'>
          <th>ID</th>
          <th>Имя</th>
          <th>Фамилия</th>
          <th>Email</th>
          <th>Телефон</th>
          <th>Ссылки</th>
      </tr>
      @foreach($users as $user)
      <tr class='tb_b'>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->surname}}</td>
          <td>{{$user->email}}</td>
          <td></td>
          <td><a href="{{ url('admin/users/edit') }}/{{$user->id}}">Редактировать</a><br>
              <a href="{{ url('admin/users/delete') }}/{{$user->id}}">Удалить</a></td>
      </tr>
      @endforeach
  </table>
@endsection
@section('right')
  Тут будет сортировка по пользователям
@endsection