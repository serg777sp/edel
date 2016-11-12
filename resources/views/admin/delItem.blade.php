@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @include('layouts._adm_panel')
        @if(empty($message))
        <span>Вы действительно хотите удалить {{$item['name']}}?</span> 
        <a href="{{ url('admin/showcase/delete') }}/{{$item->id}}/confirm">да</a>/       
        <a href="{{ url('admin/showcase/') }}">нет</a>
        <div class='item center'>
           <img src="{{$item['url']}}"><br>

           Имя - > {{$item['name']}}<br>
           Цена - > {{$item['price']}}<br>   
        </div>
   
        @else
        {{$message}} 
        @endif

    </div>
</div>
@endsection