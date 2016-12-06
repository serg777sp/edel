@extends('layouts.main')

@section('left')
  @if(count($items)>0)
    <div class='items'>
        @foreach($items as $item)
          @if($item->viewtype == 0)
             @include('blocks.itemBuk')
          @else
             @include('blocks.itemSin')
          @endif
        @endforeach
    </div>
    <div>
            <button class="btn btn-default btn-block center-block showMore">Показать еще</button>
            <input id='currentPage' type='hidden' value='1'>
            <input type="hidden" id="catId">
            <input type="hidden" id='subId'>
    </div>
  @else
  <center><h4>Товаров еще нет!</h4></center>
  @endif
@endsection
@section('right')
   @include('blocks.catalog')
   @include('blocks.sortItems')
@endsection