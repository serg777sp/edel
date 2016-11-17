           <div class="item_card">
               <img class='card' src="/img/small/{{$item->url}}">
               <h4>{{$item->name}}</h4>
               <div class='rating'>
                  <p>Рейтинг</p>
                  <p>нет</p>
               </div>
               <!--  ///////////////////////////////////////////////////////      -->
               @foreach($item->props->sortBy('razmer') as $prop)
               @if($prop->type == $prop::TYPE_PRICE_SIZE) 
               <div class='razmer' id="{{$item->id}}razmer">
                  <p>Размер</p>
                  <div class='left_arrow but_buk_l'></div>
                  <span id="razmer{{$item->id}}">{{$prop->getSizeName()}}</span>                                    
                  <div class='right_arrow but_buk_r'></div>
               </div>
               <div class='cena'>
                  <p><span class='card_price'>Цена</span><br>
                  <span class='price' id="price{{$item->id}}">{{$prop->price}}</span><span class='card_price'>&#8381;</span></p>
               </div>
               <form id="{{$item->id}}form" class='form' method='post' action="{{ url('/basket/add') }}">
                  <input id="form_razmer{{$item->id}}" type='hidden' name='razmer' value="{{$prop->razmer}}">
                  <input id="form_price{{$item->id}}" type='hidden' name='price' value="{{$prop->price}}">
                  @if(Auth::check())
                  <input id="form_user{{$item->id}}" type='hidden' name='user_id' value="{{Auth::user()->id}}">
                  @else
                  <input type='hidden' name='user_id' value="guest">
                  @endif
                  <input id="form_item{{$item->id}}" type='hidden' name='item_id' value="{{$item->id}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">               
               @break
               @endif
               @endforeach
               <!--  ///////////////////////////////////////////////////////      -->
                  @if(Auth::check())
                    <a class='floatleft card_button1' href="{{url('/showcase/item')}}/{{$item->id}}">Подробнее</a>
                    <input id="but{{$item->id}}" type='button' class='floatright card_button2 ajaxadd' value='В корзину'>
                  @else
                    <a class='floatleft card_button1 o' data-id="log" href="{{url('/showcase/item')}}/{{$item->id}}">Подробнее</a>
                    <input id="but{{$item->id}}" type='button' class='floatright card_button2 o' data-id="log" value='В корзину'>
                  @endif
               </form>
               <div class='hidden'>
               @foreach($item->props->sortBy('razmer') as $prop)
                    @if($prop->type == $prop::TYPE_PRICE_SIZE)
                        <span class='prices' id="{{$prop->getSizeName()}}-{{$item->id}}">{{$prop->price}}</span>
                    @endif
               @endforeach
               </div>
            </div>