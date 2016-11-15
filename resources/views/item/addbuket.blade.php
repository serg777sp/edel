@extends('layouts.adminmain')

@section('left')
<div class='row'>
    <div class='col-lg-8 item_form'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Форма добавления товара</div>
            <div class="panel-body"> 
                <form class='form' method='post' enctype='multipart/form-data' action="{{ url('admin/showcase/add/buket') }}">
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
                      <label>Размер:</label>
                      <select class="form-control" id='razmer' name='razmer'>
                          <option value='1'>малый</option>
                          <option value='2' selected>средний</option>
                          <option value='3'>большой</option>
                      </select>
                   </div>
                   <div>   
                      <label>Описание:</label>
                      <textarea class="form-control" name='description'>
                      </textarea>
                   </div>     
                    <button class="btn btn-block btn-success" type='submit' name='button' value='Добавить'>Добавить новый Букет</button>
                   <input type="hidden" name="_token" value="{{csrf_token()}}">
               </form>
            </div>
        </div>
    </div>
         <div class='col-lg-4 prev_item'>
            <div class="item_card">
               <img class='card' src="{{asset('img/prev.jpg')}}">
               <h4>Название какого-то букета</h4>
               <div class='rating'>
                  <p>Рейтинг</p>
                  <p>нет</p>
               </div>
               <div class='razmer'>
                  <p>Размер</p>
                  <div class='left_arrow' src="img/card_arrow_left.png"></div>
                  <span>средний</span>
                  <div class='right_arrow' src="img/card_arrow_right.png"></div>
               </div>
               <div class='cena'>
                  <p><span class='card_price'>Цена</span><br>
                  <span class='price'>1100</span><span class='card_price'>&#8381;</span></p>
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