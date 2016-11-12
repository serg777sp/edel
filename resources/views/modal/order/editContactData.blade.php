 <div id='editContactData' class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Заголовок модального окна -->
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title text-black">Изменить контакты и пожелания</h4>
            </div>
        <!-- Основное содержимое модального окна -->
            <div class="modal-body text-black">
                <div class="container">
                    <form id='form-edit-contact-data' class='form' method='post' action="{{ url('/order/step/four/update') }}">                 
                                @if(!empty($order->adresat->phone))
                                    <label>
                                        <input type='radio' name='phone' value='adresat'> 
                                        {{$order->adresat->phone}} - телефон адресата
                                    </label>    
                                @endif 
                                @if(!empty($order->user->phone))
                                    <label>
                                        <input type='radio' name='phone' value='user'>
                                        {{$order->user->phone}} - пользовательский 
                                    </label>    
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
                               <input type="hidden" name="_token" value="{{csrf_token()}}">
                               <input type="hidden" name="order_id" value="{{$order->id}}">
                               <input type="hidden" name='stepdata' value='3'>
                            </form>
                </div>
             <!--   </div>
             Футер модального окна -->
                <div class="modal-footer">
                    <button form="form-edit-contact-data" class="btn btn-success" type='submit'>Сохранить измения</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</div>

