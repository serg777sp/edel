@extends('layouts.adminmain')

@section('left')
    @if($item['viewtype'] == 0)
          @include('blocks.admitemBuk')
    @else
          @include('blocks.admitemSin')
    @endif
    <span>Вы действительно хотите удалить {{$item['name']}}?</span> 
    <a href="{{ url('admin/showcase/delete') }}/{{$item['id']}}/confirm">да</a>/       
    <a href="{{ url('admin/showcase/') }}">нет</a>
@endsection
@section('right')
@include('blocks.showcase_option')
@endsection