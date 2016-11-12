@extends('layouts.adminmain')

@section('left')
<div class='orders_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-pushpin"></span> Краткая статистика</div>
        <div class="panel-body"> 
            <p>    
            Заказы на оформлении - {{$of_count}} |
            Заказы на оплате - {{$neoplat_count}} |
            Активных заказов - {{$active_count}}
               @if($reqcalls_count >0) |
                   <a href="{{ url('admin/reqcall/show')}}">Заказанно звонков</a> - {{$reqcalls_count}}
               @endif    
            </p>
        </div>
    </div>    
</div>
<div class='orders_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-ok"></span> Заказы на выплнение</div>
        <div class="panel-body">      
            @if($active_count==0)
            Заказов нет
            @else
                  <table class='table table-striped table-hover'>
                    <tr>
                       <th>ID</th>
                       <th>Пользователь</th>
                       <th>Статус</th>
                       <th>Дата Доставки</th>
                       <th>Сумма</th>
                       <th></th>
                    </tr>
                 @foreach($orders as $order)
                    <tr>
                      <td>{{$order->id}}</td>
                      <td>
                          {{$order->user->name}} {{$order->user->surname}}
                      </td>
                      <td>
                          @if($order->status==0) оформляется @endif
                          @if($order->status==1) ожидание оплаты @endif
                          @if($order->status==2) Ожидание доставки @endif
                          @if($order->status==3) Выполнен @endif
                      </td>
                      <td>{{$order->datetime}}</td>
                      <td class="rub">{{$order->getCount()}} &#8381;</td>
                      <td>
                        <a title='Подробнее' data-id='{{$order->id}}' href="{{url('/order/show')}}/{{$order->id}}"><span class="glyphicon glyphicon-search"></span></a>
                      <td>  
                    </tr>
                 @endforeach
                 </table>
            @endif
        </div>
    </div>    
 </div>
<!--modal-->
    @include('modal.adm.order-modal-hidden')
<!--end modal-->
@endsection
@section('right')
   @include('blocks.static_option')
@endsection