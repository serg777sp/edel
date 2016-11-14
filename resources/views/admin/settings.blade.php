@extends('layouts.adminmain')

@section('left')

 <div class='orders_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> Редактирование настроек</div>
        <div class="panel-body">
            <table class='table'>
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
                     <a class='ed_set' data-id="{{$set->id}}"><span class="glyphicon glyphicon-cog"></span></a><br>
                 <td>  
               </tr>
            @endforeach
            </table>
        </div>
    </div>    
 </div>
@endsection
@section('right')
    @include('modal.adm.editSet')
@endsection