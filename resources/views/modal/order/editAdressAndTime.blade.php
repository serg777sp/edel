 <div id='editAdressAndTime' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">Изменить адрес или дату</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    <form id='form-edit-adress-time' class='form' method='post' action="{{ url('/order/step/four/update') }}">
                        <label>    
                            @if(!$order->self_user)
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
                                    @if(!empty($order->user->adress))
                                        <input type='radio' name='adress' value='user'>
                                        {{$order->user->adress}}
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
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <input type="hidden" name='stepdata' value='2'>
                    </form>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button form="form-edit-adress-time" class="btn btn-success" type='submit'>Сохранить изменения</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>
