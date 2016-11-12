@extends('layouts.adminmain')

@section('left')

 <div class='orders_box'>
       <table class='order_table'>
         <tr>
            <th>Название</th>
            <th>Значение</th>
            <th></th>
         </tr>
      @foreach($settings as $set)
         @if($set->name == 'adm_pass') @continue @endif
         <tr>
           <td>
               @if($set->name == 'phone1') Первый контактный телефон @endif
               @if($set->name == 'phone2') Второй контактный телефон @endif
               @if($set->name == 'slide1') Слоган первого слайда @endif
               @if($set->name == 'slide2') Слоган вторго слайда @endif
               @if($set->name == 'slide3') Слоган третьего слайда @endif
               @if($set->name == 'slide4') Слоган четвертого слайда @endif
               @if($set->name == 'SmsSender') Номер sms оповещения @endif
               @if($set->name == 'SmsToken') Token sms оповещения @endif
           </td>
           <td>{{$set->val}}</td>
           <td>             
               <a class='link ed_set' id="{{$set->id}}">редактировать</a><br>
           <td>  
         </tr>
      @endforeach
      </table>
 </div>
@endsection
@section('right')
 @foreach($settings as $set)
 @if($set->name == 'adm_pass') @continue @endif
  @if($set->id < 3)
  <div class='orders_box hidden' id="set{{$set->id}}">
      Изменяем - @if($set->name == 'phone1') Первый контактный телефон @endif
               @if($set->name == 'phone2') Второй контактный телефон @endif
      <hr>         
      <form class='form' method='post' action="{{url('/admin/setting/update')}}">
          <div>
             <input type='text' name="val">
          </div>
          <button type='submit'>Сохранить</button>
          <button class='res' type='button'>Убрать форму</button>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="set_id" value="{{$set->id}}">   
      </form>
  </div>
  @else
    <div class='orders_box hidden' id="set{{$set->id}}">
      Изменяем - @if($set->name == 'slide1') Слоган первого слайда @endif
               @if($set->name == 'slide2') Слоган вторго слайда @endif
               @if($set->name == 'slide3') Слоган третьего слайда @endif
               @if($set->name == 'slide4') Слоган четвертого слайда @endif
      <hr>         
      <form class='form' method='post' action="{{url('/admin/setting/update')}}">
          <div>
             <textarea name="val"></textarea>
          </div>
          <button type='submit'>Сохранить</button>
          <button class='res' type='button'>Убрать форму</button>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="set_id" value="{{$set->id}}">   
      </form>
  </div>
  @endif
 @endforeach
@endsection