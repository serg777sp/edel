<div class='order_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Заказ № {{$order->id}}</div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>Получатель</td>
                    <td>
                        @if(!is_null($order->adresat_id))
                            @if($order->self_user)
                                Заказчик
                            @else
                                {{$order->adresat->name}} {{$order->adresat->surname}}
                            @endif
                        @else
                            нету
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Адрес</td>
                    <td>
                        @if(!empty($order->adress))
                            @if($order->adress == 'user')
                                {{$order->user->adress}}
                            @endif
                            @if($order->adress == 'adresat')
                                {{$order->adresat->adress}}
                            @endif
                            @if(($order->adress != "user")&&($order->adress != 'adresat'))
                              {{$order->adress}}
                            @endif
                        @else
                            нету
                        @endif
                        
                    </td>                       
                </tr>
                <tr>
                    <td>Дата и время</td>
                    <td>
                        @if(!empty($order->datetime))
                            {{$order->datetime}}
                        @else
                            нету
                        @endif
                    </td>                    
                </tr>
                <tr>
                    <td>Контактный телефон</td>
                    <td>
                        @if(!empty($order->phone))
                            @if($order->phone == 'user')
                                {{$order->user->phone}}
                            @endif
                            @if($order->phone == 'adresat')
                                {{$order->adresat->phone}}
                            @endif
                            @if(($order->phone != "user")&&($order->phone != 'adresat'))
                                {{$order->phone}}
                            @endif
                        @else
                            нету
                        @endif                            
                    </td>                    
                </tr>
                <tr>
                    <td>Пожелание/открытка</td>
                    <td>
                        @if(!empty($order->voice))
                            {{$order->voice}}
                        @endif
                        @if(!empty($order->postcard))
                            {{$order->postcard}}
                        @endif
                        @if((empty($order->voice))&&(empty($order->postcard)))
                            нету
                        @endif
                    </td>                    
                </tr>                
            </table>
            <form class='hidden_block' method='post' id='confim_order' action="{{url('/order/finish')}}">
                <button class="btn btn-block btn-success" type='submit'>Завершить оформление</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="order_id" value="{{$order->id}}">
            </form> 
        </div>
    </div>         
</div>