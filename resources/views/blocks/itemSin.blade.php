            <div class="item_card" id="{{$item->id}}">
               <img class='card' src="/img/small/{{$item->getImageName()}}">
               <h4>{{$item->name}}</h4>

               <div class='dlina' id="{{$item->id}}dlina">
                 <p>Длинна</p>
                 <div class='left_arrow but_sin_l'></div>
                 <input form="{{$item->id}}form" id="dlina{{$item->id}}"  class='pole dlina' name='dlina' type='text' value="{{$item->getFirstSize()}}">
                 <div class='right_arrow but_sin_r'></div>
               </div>
               <div class='kolvo' id="{{$item->id}}kolvo">
                  <p>Количество</p>
                  <div class='left_arrow but_kolvo_l'></div>
                  <input form="{{$item->id}}form" class='pole' id="kolvo{{$item->id}}" name='kolvo' type='text' value='1'>
                  <div class='right_arrow but_kolvo_r'></div>
               </div>
               <div class='cena'>
                 <p>
                    <span class='card_price'>Цена</span><br>
                    <span class='price' id="price{{$item->id}}">{{$item->getFirstPrice()}}</span><span class='card_price'>&#8381;</span>
                 </p>
               </div>
               <form id="{{$item->id}}form" class='form' method='post' action="{{ url('/basket/add') }}">
                  <input id="form_price{{$item->id}}" type='hidden' name='price' value="{{$item->getFirstPrice()}}">
                  @if(Auth::check())
                  <input id="form_user{{$item->id}}" type='hidden' name='user_id' value="{{Auth::user()->id}}">
                  @else
                  <input id="form_user{{$item->id}}" type='hidden' name='user_id' value="guest">
                  @endif
                  <input id="form_item{{$item->id}}" type='hidden' name='item_id' value="{{$item->id}}">
                  @if(Auth::check())
                    <a class='floatleft card_button1' href="{{url('/showcase/item')}}/{{$item->id}}">Подробнее</a>
                    <input type='button' class='floatright card_button2 ajaxadd' value='В корзину'>
                  @else
                    <a class='floatleft card_button1 o' data-id="log" href="{{url('/showcase/item')}}/{{$item->id}}">Подробнее</a>
                    <input type='button' class='floatright card_button2 o' data-id="log" value='В корзину'>
                  @endif
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
               </form>
               <div class='hidden'>
                   <span class="single_value{{$item->id}}">{{$item->getFirstPrice()}}</span>
               @foreach($item->props()->orderBy('size')->get() as $prop)
                   <span class='dlini' id="{{$prop->size}}{{$item->id}}">{{$prop->price}}</span>
               @endforeach
               </div>
            </div>