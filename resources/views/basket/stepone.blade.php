@extends('layouts.main')

@section('left')
                <div class='order_box'>
                    <div class="panel panel-warning">
                        <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Выбирите получателя</div>
                        <div class="panel-body">
                            @if(Auth::user()->adresats->count() > 0)
                                <form class='form' method='post' action="{{ url('/order/step/two') }}">
                                    <select name='adresat_id' class="form-control">
                                    @foreach(Auth::user()->adresats as $adresat)
                                        <option value="{{$adresat['id']}}">{{$adresat['name']}} {{$adresat['surname']}}</option>
                                    @endforeach
                                    </select><br>
                                    <a href="{{ url('/cabinet/adresat/add') }}">Добавить получателя</a><br><br>
                                    <input type='checkbox' name='self' value='true'> Доставить заказ мне <br>
                                    <button class="btn btn-success" type='submit'>Далее</button>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="order_id" value="{{$order->id}}">                         
                                </form> 
                            @else 
                                <h4>У Вас еще нет получателей! 
                                    <a href="{{ url('/cabinet/adresat/add') }}">Добавить получателя</a>
                                </h4>
                                <form class='form' method='post' action="{{ url('/order/step/two') }}">
                                    <input type='checkbox' name='self' value='true'> Доставить заказ мне <br>
                                    <button type='submit'>Далее</button>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="order_id" value="{{$order->id}}">  
                                </form>  
                            @endif
                        </div>
                    </div>    
                </div>
@include('blocks.order')                
@endsection
@section('right')
   @include('blocks.catalog')
@endsection