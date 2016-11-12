@extends('layouts.adminmain')

@section('left')
@if(!empty($orders))
<div class='orders_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-paperclip"></span> Все заказы</div>
        <div class="panel-body">
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
                 <td>{{$order->user->name}} {{$order->user->surname}}</td>
                 <td>
                     @if($order->status==0) оформляется @endif
                     @if($order->status==1) ожидание оплаты @endif
                     @if($order->status==2) ожидание доставки @endif
                     @if($order->status==3) выполнен @endif
                 </td>
                 <td>{{$order->datetime}}</td>
                 <td class="rub">{{$order->getCount()}} &#8381;</td>
                 <td>
                    <a href="{{url('/order/show')}}/{{$order->id}}"> 
                        <button class="btn btn-sm btn-info btn-order">                       
                           <span class="glyphicon glyphicon-search text-white"></span>    
                        </button>      
                    </a>
                    <button class="btn btn-sm btn-danger btn-order">
                        <a href="#">
                                <span class="glyphicon glyphicon-remove text-white"></span>
                        </a>    
                    </button>
                    @if($order->status==2)
                        <button class="btn btn-sm btn-success btn-order-ok">
                            <a class="text-white noLinks" href="#">
                                <span class="glyphicon glyphicon-ok-sign text-white"></span> Доставлено                                   
                            </a>
                        </button>    
                    @endif
                     
                 <td>  
               </tr>
            @endforeach
            </table>
        </div>
    </div>
    {{$orders->render()}}
</div>
@else
  Заказов еще нет
@endif  
@endsection
@section('right')
  @include('blocks.sort_orders')
@endsection