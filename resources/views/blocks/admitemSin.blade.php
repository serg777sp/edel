            <div class="item_card">
               <img class='card' src="/img/small/{{$item['url']}}">
               <h4>{{$item['name']}}</h4>
               <div class='dlina'>
                 <p>Длинна</p>
                 <div class='left_arrow but_sin_l'></div>
                 <input  class='pole dlina' name='dlina' type='text' value='50'>
                 <div class='right_arrow but_sin_r'></div>
               </div>
               <div class='kolvo'>
                  <p>Количество</p>
                  <div class='left_arrow' src="img/card_arrow_left.png"></div>
                  <input class='pole' name='kolvo' type='text' value='1'>
                  <div class='right_arrow' src="img/card_arrow_right.png"></div>
               </div>
               <div class='cena'>
                 <p>
                    <span class='card_price'>Цена</span><br>
                    <span class='price'>100</span><span class='card_price'>&#8381;</span>
                 </p>
               </div>
               <a class='floatleft card_button1' href="/admin/showcase/edit/{{$item['id']}}">Редактировать</a>
               <a class='floatright card_button2' href="/admin/showcase/delete/{{$item['id']}}">Удалить</a>
            </div>