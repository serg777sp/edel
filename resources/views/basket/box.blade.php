@if(Auth::check())
    @if($item_count>0)
    <p>Выбрано товаров - <span class="bold">{{$item_count}}</span><br>сумма - <span class="bold">{{$summa}}</span> руб.</p>
    @else 
    <p class='bold m'>Корзина<br> пуста</p>
    @endif 
    <a class='bold' href="{{url('/basket')}}">оформить</a>
@else
    <p class='bold m'>Корзина<br> пуста</p> 
    <a class='bold' href="{{url('/basket')}}">оформить</a>
@endif
