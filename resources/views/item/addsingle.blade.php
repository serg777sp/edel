@extends('layouts.adminmain')

@section('left')
<div class='edit_item'>
         <div class='item_form'>
                    <form class='form' method='post' enctype='multipart/form-data' action="{{ url('admin/showcase/add/single') }}">
                    @if (count($errors) > 0)
                    <ul>
                       @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                    @endif
                       <div>
                          Категория:
                          <select id='cat' name='cat'>
                              <option value='0' selected>нет</option>
                              @foreach($cats as $cat)
                              <option value="{{$cat['id']}}">{{$cat['name']}}<option>   
                              @endforeach
                          </select>
                          @foreach($cats as $cat)
                          <select id="id{{$cat['id']}}" class='subhid'>
                              <option value='0' selected>Нет</option>
                              @foreach($subs as $sub)                                   
                                 @if($cat['id'] == $sub['categorie_id'])
                                    <option value="{{$sub['id']}}">{{$sub['name']}}</option>
                                 @endif
                              @endforeach
                          </select>
                          @endforeach 
                       </div>
                       <div>
                          Главное изображение
                          <input id='image' type='file' name='foto'>
                       </div>
                       <div>   
                          Имя:
                          <input id='item_name' type='text' name='name'>
                       </div>
                       <div>   
                          Цена:
                          <input id='price' type='text' name='price'>
                          Длинна:
                          <select id='dlina' name='dlina'>
                              <option value='50'>50 см</option>
                              <option value='60' selected>60 см</option>
                              <option value='70'>70 см</option>
                              <option value='80'>80 см</option>
                              <option value='90'>90 см</option>
                              <option value='100'>100 см</option>
                              <option value='110'>110 см</option>
                          </select>
                       </div>
                       <div>   
                          Описание:<br><br>
                          <textarea name='description'>
                          </textarea>
                       </div>     
                       <button type='submit' name='button' value='Добавить'>Добавить Штучный товар</button>
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                   </form><br>
         </div>
         <div class='prev_item'>
            <div class="item_card">
               <img class='card' src="{{asset('img/prev.jpg')}}">
               <h4>Красные розы</h4>
               <div class='kolvo'>
                  <p>Количество</p>
                  <div class='left_arrow' src="img/card_arrow_left.png"></div>
                  <input class='pole' name='kolvo' type='text' value='1'>
                  <div class='right_arrow' src="img/card_arrow_right.png"></div>
               </div>
               <div class='dlina'>
                 <p>Длинна</p>
                 <div class='left_arrow' src="img/card_arrow_left.png"></div>
                 <input  class='pole dlina' name='dlina' type='text' value='50'>
                 <div class='right_arrow' src="img/card_arrow_right.png"></div>
               </div>
               <div class='cena'>
                 <p>
                    <span class='card_price'>Цена</span><br>
                    <span class='price'>100</span><span class='card_price'>&#8381;</span>
                 </p>
               </div>
               <div class='floatleft card_button1'>Подробнее</div>
               <input class='floatright card_button2' type='submit'value='В корзину'>
            </div>
         </div>
</div>                   
@endsection
@section('right')
@include('blocks.showcase_option')
@endsection