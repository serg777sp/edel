@extends('layouts.adminmain')

@section('left')
    <div class="row">
        <div class="col-lg-8">
            <img class='bigfoto' src="/img/original/{{$item->getImageName()}}">
        </div>
        <div class="col-lg-4 no-padding">
            @if($item['viewtype'] == 0)
                  @include('blocks.admitemBuk')
            @else
                  @include('blocks.admitemSin')
            @endif
            <div>
                @foreach($item->getPhotos() as $prop)
                    @if(!empty($prop->img_url))
                        <button class="btn btn-lg btn-info show_photo" data-url="{{$prop->img_url}}">{{$prop->size}}</button>
                    @else
                        <button class="btn btn-lg btn-info show_photo" data-url="noImage.jpg">{{$prop->size}}</button>
                    @endif
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