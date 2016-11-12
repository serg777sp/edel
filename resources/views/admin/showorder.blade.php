@extends('layouts.adminmain')

@section('left')
   <div class='order_box'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Данные пользователя совершившего заказ</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Имя</td>
                        <td>{{$order->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Фамилия</td>
                        <td>
                            @if(empty($order->user->surname))
                                не указанно
                            @else
                            {{$order->user->surname}}
                            @endif 
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$order->user->email}}</td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td>
                            @if(empty($order->user->phone))
                                не указанно
                            @else
                                {{$order->user->phone}}
                            @endif 
                        </td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td>
                            @if(empty($order->user->adress))
                                не указанно
                            @else
                                {{$order->user->adress}}
                            @endif 
                        </td>
                    </tr>
                </table>
            </div>
        </div>    
   </div>
@include('blocks.order')
<div class='orders_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-paperclip"></span> Товары входящие в заказ</div>
        <div class="panel-body">
            <table class='table'>
                <tr>
                   <th>Название</th>
                   <th>Количество</th>
                   <th>Размер/длина</th>
                   <th>Цена</th>
                   <th></th>
                </tr>
                @foreach($order->OrderItems as $item)
                <tr>
                   <td>{{$item->name()}}</td>
                   <td>
                       @if(empty($item['kolvo']))
                       1
                       @else
                       {{$item['kolvo']}}
                       @endif
                   </td>
                   <td>{{$item['op_val']}}</td>
                   <td>{{$item['end_price']}}</td>
                   <td>
                       @if(Auth::user()->isAdmin())
                        <a class="editOrderItem" data-id='{{$item->id}}' href="#">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                       @endif
                   </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>    
</div>
<!--modal-->
    @include('modal.order.editAdresat')
    @include('modal.order.editAdressAndTime')
    @include('modal.order.editContactData')
    <div class="hidden-block modal-block"></div>
@endsection
@section('right')
  @include('blocks.orderOptions')
@endsection