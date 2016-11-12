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
                    <div class='prices table-inline' style="width: 100%">
                        <table>
                            @foreach($item->item->getPrices() as $price)
                                <tr>
                                    <td>
                                        <button class="btn btn-default btn-no-margin selectDlina" data-dlina='{{$price->dlina}}'>{{$price->dlina}} см</button>
                                        <input type="hidden" value="{{$price->price}}">
                                    </td>
                                    <td> - {{$price->price}} &#8381;</td> 
                                </tr>
                            @endforeach
                        </table>         
                        <table>
                            <tr>
                                <td>Цена</td>
                                <td><span id='currentPrice'>{{$item->end_price}}</span> &#8381;</td>
                            </tr>
                            <tr>
                                <td>Длина</td>
                                <td id='currentDlina'>{{$item->op_val}} cм</td>
                            </tr>
                            <tr>
                                <td>Количество</td>
                                <td id='currentCount'>
                                    <button class="btn btn-xs btn-danger btn-with-horisontal-margin"><span class="glyphicon glyphicon-minus minusCount"></span></button>
                                    <span class="currentCount">{{$item->kolvo}}</span>
                                    <button class="btn btn-xs btn-success btn-with-horisontal-margin"><span class="glyphicon glyphicon-plus plusCount"></span></button>
                                </td>
                            </tr>
                        </table>
                        <form class='form' method="post" action="{{url('/basket/add')}}">
                            <input type="hidden" id="form_item" name='item_id' value="{{$item->id}}">
                            <input type="hidden" id='form_user' if name='user_id' value="{{Auth::user()->id}}">
                            <input type="hidden" id='form_dlina' name='dlina' value="{{$item->op_val}}">
                            <input type='hidden' id='form_count' value='{{$item->kolvo}}'>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">         
                        </form>
                        <h2>Не работает!!!!</h2>
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