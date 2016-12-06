@extends('layouts.adminmain')

@section('left')
  @if(count($items) > 0)
     @foreach($items as $item)
       @if($item['viewtype'] == 0)
          @include('blocks.admitemBuk')
       @else
          @include('blocks.admitemSin')
       @endif
     @endforeach
  @else
       <center><h4>Товаров еще нет!</h4></center>
  @endif
  {{$items->render()}}
@endsection
@section('right')
@include('blocks.showcase_option')
@include('blocks.admsort_catalog')
@endsection