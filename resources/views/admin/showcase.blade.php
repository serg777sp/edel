@extends('layouts.adminmain')

@section('left')
  @if(!empty($items))
     @foreach($items as $item)
       @if($item['viewtype'] == 0)
          @include('blocks.admitemBuk')
       @else
          @include('blocks.admitemSin')
       @endif
     @endforeach
  @else
     Товаров еще не созданно 
  @endif
@endsection
@section('right')
@include('blocks.showcase_option')
@include('blocks.admsort_catalog')
@endsection