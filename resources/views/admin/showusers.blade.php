@extends('layouts.adminmain')

@section('left')
<div class='orders_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Пользователи</div>
        <div class="panel-body">  
            <table class='table table-striped table-hover'>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <a href="{{ url('admin/users/edit') }}/{{$user->id}}"><span class="glyphicon glyphicon-search"></span></a>
                        <a href="{{ url('admin/users/delete') }}/{{$user->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>    
@endsection
@section('right')
    @include('blocks.sort-users')
@endsection