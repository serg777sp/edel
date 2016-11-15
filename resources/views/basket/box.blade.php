@if(Auth::check())
    @if(Auth::user()->baskets->count()>0)
    <p>Выбрано товаров - <span class="bold">{{Auth::user()->baskets->count()}}</span><br>сумма - <span class="bold">{{Auth::user()->getBasketSum()}}</span> руб.</p>
    @else 
    <p class='bold m'>Корзина<br> пуста</p>
    @endif 
    <a class='bold' href="{{url('/basket')}}">оформить</a>
@else
    <p class='bold m'>Корзина<br> пуста</p> 
    <a class='bold' href="{{url('/basket')}}">оформить</a>
@endif
