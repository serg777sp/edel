@extends('layouts.adminmain')

@section('left')
    <div class="row">
        <div class="col-lg-8">
            <img class='bigfoto' src="/img/original/{{$item['url']}}">
        </div>
        <div class="col-lg-4 no-padding">
            @if($item['viewtype'] == 0)
                  @include('blocks.admitemBuk')
            @else
                  @include('blocks.admitemSin')
            @endif
            <div>
                @foreach($item->getPhotos() as $photo)
                    <button class="btn btn-lg btn-info show_photo" data-url="{{$photo->imgurl}}">{{$photo->razmer}}</button>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row with-top-margin">
        @include('blocks.edititem')
        @include('blocks.edititemprice')
    </div>
    <div class="row with-top-margin">
        @include('blocks.editimage')
    </div>    
@endsection
@section('right')
@include('blocks.showcase_option')
@endsection