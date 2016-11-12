@extends('layouts.main')

@section('left')
                <div class='order_box'>
                    <div class="panel panel-warning">
                        <div class="panel-heading"><span class="glyphicon glyphicon-time"></span> Адрес, дата и время</div>
                        <div class="panel-body">                    
                            <form class='form' method='post' action="{{url('/order/step/three')}}">
                                <label>    
                                    @if($order->adresat_id>0)
                                        <div>
                                            @if(!empty($order->adresat->adress))
                                                    <input type='radio' name='adress' value='adresat'> 
                                                    {{$order->adresat->adress}}   
                                            @else
                                                У получателя не определен адрес
                                            @endif
                                        </div>    
                                    @else
                                        <div>
                                            @if(!empty(Auth::user()->adress))
                                                <input type='radio' name='adress' value='user'>
                                                {{Auth::user()->adress}}
                                            @else
                                                У Вас не определен адрес
                                            @endif
                                        </div> 
                                    @endif
                                </label>
                                <label>
                                    <div>
                                        <input type='radio' name='adress' value='other' checked>
                                        Использовать введеный адрес
                                    </div>
                                </label>
                                <label>
                                    Адрес:
                                </label>    
                                <div>
                                    <textarea class="form-control" name='other_adress'></textarea>
                                </div>
                                <label>Дата и время доставки</label>
                                <div>
                                    <input class="form-control date-time-picker" type='text' name='datetime' id='dt'>
                                </div>
                                
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
