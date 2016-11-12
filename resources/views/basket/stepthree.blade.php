@extends('layouts.main')

@section('left')
                <div class='order_box'>
                    <div class="panel panel-warning">
                        <div class="panel-heading"><span class="glyphicon glyphicon-phone"></span> Контакты</div>
                        <div class="panel-body">
                            <form class='form' method='post' action="{{url('/order/step/four')}}">    
                                @if(!is_null($order->adresat_id))               
                                    @if(!empty($order->adresat->phone))
                                        <label>
                                            <input type='radio' name='phone' value='adresat'> 
                                            {{$order->adresat->phone}} - телефон адресата
                                        </label>    
                                    @endif 
                                    @if(!empty(Auth::user()->phone))
                                        <label>
                                            <input type='radio' name='phone' value='user'>
                                            {{Auth::user()->phone}} - Ваш телефон 
                                        </label>    
                                    @endif                   
                                @endif
                                <label>
                                    <input type='radio' name='phone' value='other' checked>
                                    Использовать введеный телефон
                                </label>    
                                <input class="form-control" type='tel' name='other_phone'><br>
                                <label>Как и Что передать</label>
                                <div>
                                    <input type='radio' name='PS' value='word' checked>
                                    На словах                             
                                </div>
                                <div>
                                    <input type='radio' name='PS' value='postcard'>
                                    Открыткой                              
                                </div>
                                <div>
                                    <input type='radio' name='PS' value='none'>
                                    Ничего не передавать                              
                                </div>                         
                                <textarea class="form-control" id='PS' name='PStext'>Что предать на словах?</textarea>
                                <button class="btn btn-success" type='submit'>Далее</button>
                               <input type="hidden" name="_token" value="{{csrf_token()}}">
                               <input type="hidden" name="order_id" value="{{$order->id}}">     
                            </form>
                        </div>
                    </div>    
                </div>
@include('blocks.order')                
@endsection
@section('right')
   @include('blocks.catalog')
@endsection
