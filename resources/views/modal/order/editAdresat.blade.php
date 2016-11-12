 <div id='editAdresat' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">Изменить адресата</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    @if($order->user->adresats->count() > 0)
                        <form id='form-edit-adresat' class='form' method='post' action="{{ url('/order/step/four/update') }}">
                            <select name='adresat_id' class="form-control">
                            @foreach($order->user->adresats as $adresat)
                                <option value="{{$adresat['id']}}">{{$adresat['name']}} {{$adresat['surname']}}</option>
                            @endforeach
                            </select><br>
                            <input type='checkbox' name='self' value='true'>
                            @if(Auth::user()->isAdmin())
                                Доставить пользователю {{$order->user->getFIO()}}
                            @else
                                Доставить заказ мне
                            @endif <br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <input type="hidden" name='stepdata' value='1'>
                        </form> 
                    @else 
                        <h4>У Вас еще нет получателей! 
                        </h4>
                        <form id='form-edit-adresat' class='form' method='post' action="{{ url('/order/step/four/update') }}">
                            <input type='checkbox' name='self' value='true'> Доставить заказ мне <br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <input type="hidden" name='stepdata' value='1'>
                        </form>  
                    @endif
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button form="form-edit-adresat" class="btn btn-success" type='submit'>Изменить адресата</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>

