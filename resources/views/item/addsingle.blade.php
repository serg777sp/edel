@extends('layouts.adminmain')

@section('left')
<div class='row'>
    <div class='col-lg-8 item_form'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Форма добавления товара</div>
            <div class="panel-body"> 
                <form class='form' method='post' enctype='multipart/form-data' action="{{ url('admin/showcase/add/single') }}">
                   <div>
                       <label>Категория:</label>
                      <select class="form-control" id='cat' name='cat'>
                          <option value='0' selected>нет</option>
                          @foreach($cats as $cat)
                          <option value="{{$cat['id']}}">{{$cat['name']}}<option>   
                          @endforeach
                      </select>
                      @foreach($cats as $cat)
                      <select id="id{{$cat['id']}}" class='form-control subhid'>
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
                      <label>Главное изображение:</label>
                      <input class="form-control" id='image' type='file' name='foto'>
                   </div>
                   <div>   
                      <label>Имя:</label>
                      <input class="form-control" id='item_name' type='text' name='name'>
                   </div>
                   <div>   
                      <label>Цена:</label>
                      <input class="form-control" id='price' type='text' name='price'>
                      <label>Длинна:</label>
                      <select class="form-control" id='dlina' name='size'>
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
                      <label>Описание:</label>
                      <textarea class="form-control" name='description'>
                      </textarea>
                   </div>     
                    <button class="btn btn-block btn-success" type='submit' name='button' value='Добавить'>Добавить Штучный товар</button>
                   <input type="hidden" name="_token" value="{{csrf_token()}}">
               </form>
            </div>
        </div>
         </div>
         <div class='col-lg-4 prev_item'>
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