@extends('layouts.main')

@section('left')
    @if($item->viewtype === 0)
        @include('item.showBuket')
    @else
        @include('item.showSingle')
    @endif
@endsection
@section('right')
 @include('blocks.catalog')
@endsection