@extends('layouts.adminmain')

@section('left')
   <img class='bigfoto' src="/img/original/{{$item['url']}}">
    @if($item['viewtype'] == 0)
          @include('blocks.admitemBuk')
    @else
          @include('blocks.admitemSin')
    @endif
    @include('blocks.admaddphoto')
    @include('blocks.edititem')
    @include('blocks.edititemprice')
    @include('blocks.editimage')
@endsection
@section('right')
@include('blocks.showcase_option')
@endsection