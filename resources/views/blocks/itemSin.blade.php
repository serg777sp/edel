            <div class="item_card" id="{{$item->id}}">
               <img class='card' src="/img/small/{{$item->url}}">
               <h4>{{$item->name}}</h4>
               <!--  /////////////////////////////////////////////////////////// -->
               @foreach($item->props->sortBy('dlina') as $prop)
               @if($prop->type == $prop::TYPE_PRICE_LENGTH)  
               <div class='dlina' id="{{$item->id}}dlina">
                 <p>Длинна</p>
                 <div class='left_arrow but_sin_l'></div>
                 <input form="{{$item->id}}form" id="dlina{{$item->id}}"  class='pole dlina' name='dlina' type='text' value="{{$prop->dlina}}">
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
                    <span class='price' id="price{{$item->id}}">{{$prop->price}}</span><span class='card_price'>&#8381;</span>
                 </p>
               </div>
               <form id="{{$item->id}}form" class='form' method='post' action="{{ url('/basket/add') }}">
                  <input id="form_price{{$item->id}}" type='hidden' name='price' value="{{$prop->price}}">
                  @if(Auth::check())
                  <input id="form_user{{$item->id}}" type='hidden' name='user_id' value="{{Auth::user()->id}}">
                  @else
                  <input id="form_user{{$item->id}}" type='hidden' name='user_id' value="guest">
                  @endif
                  <input id="form_item{{$item->id}}" type='hidden' name='item_id' value="{{$item->id}}">     
                  <a class='floatleft card_button1' href="{{url('/showcase/item')}}/{{$item->id}}">Подробнее</a>
                  <input type='button' class='floatright card_button2 ajaxadd' value='В корзину'>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
               </form>
               <div class='hidden'>
                   <span class="single_value{{$item->id}}">{{$prop->price}}</span>
               @break
               @endif
               @endforeach
               <!--  /////////////////////////////////////////////////////////// -->                      
               @foreach($item->props->sortBy('dlina') as $prop)
                   @if($prop->type == $prop::TYPE_PRICE_LENGTH)
                   <span class='dlini' id="{{$prop->dlina}}{{$item->id}}">{{$prop->price}}</span>
                   @endif
               @endforeach
               </div>
            </div>