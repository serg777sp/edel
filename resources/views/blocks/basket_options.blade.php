 <div class="catalog">
    <h4>Опции</h4>
    <div id="cssmenu">
        <ul>
            @if(Auth::user()->baskets->count() > 0)
                <li><a class='clearlink' href="{{ url('/order/step/one') }}">Оформить заказ</a></li>
            @endif
           <li><a class='clearlink' href="{{ url('/basket/clear')}}">Очистить корзину</a></li>   
        </ul>
    </div>    
 </div>