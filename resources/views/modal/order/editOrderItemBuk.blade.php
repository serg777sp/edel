 <div id='editOrderItem' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">{{$item->name()}} - заказ № {{$item->order->id}}</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    <div class='prices sh' style="width: 520px">                       
                        <div class="panel panel-warning">
                            <div class="panel-heading"><small>Размер букета</small></div>
                            <div class="panel-body">
                                <div class="order_box" style="width: 40%">
                                @foreach($item->item->getPrices() as $price)
                                   <div>
                                      @if($price->razmer === 1) <button class="btn btn-default btn-block selectSize" data-size='{{$price->razmer}}'>Малый</button> @endif
                                      @if($price->razmer === 2) <button class="btn btn-default btn-block selectSize" data-size='{{$price->razmer}}'>Средний</button> @endif
                                      @if($price->razmer === 3) <button class="btn btn-default btn-block selectSize" data-size='{{$price->razmer}}'>Большой</button> @endif
                                      <input type='hidden' value='{{$price->price}}'>
                                   </div>   
                                @endforeach
                                </div>
                                <div class="order_box" style="width: 40%">
                                    <table class="table">
                                        <tr>
                                            <td>Цена</td>
                                            <td id='currentPrice'>{{$item->end_price}}</td>
                                        </tr>
                                        <tr>
                                            <td>Размер</td>
                                            <td id='currentSize'>{{$item->getSizeName()}}</td>
                                        </tr>                    
                                    </table>
                                </div>    
                                <form class='form' method="post" action="{{url('/basket/add')}}">
                                    <input type="hidden" id="form_item" name='item_id' value="{{$item->id}}">
                                    <input type="hidden" id='form_user' if name='user_id' value="{{Auth::user()->id}}">
                                    <input type="hidden" id='form_razmer' name='razmer' value="{{$item->end_price}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">         
                                </form>
                                <h2>Не работает!!!!</h2>
                            </div>
                        </div>   
                    </div>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button form="form-edit-order-item" class="btn btn-success" type='submit'>Изменить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>