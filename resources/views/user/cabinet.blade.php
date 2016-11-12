@extends('layouts.main')

@section('left')
   <div class='order_box'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Личные данные</div>
        <div class="panel-body">
            <table class="table">
                <thead></thead>
                <tbody>
                    <tr>
                        <td>Ф.И.О.</td>
                        <td>{{Auth::user()->getFIO()}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            @if(empty(Auth::user()->email))
                            не указанно
                            @else
                            {{Auth::user()->email}}
                            @endif 
                        </td>
                    </tr>
                    <tr>
                        <td>Телефон<small>(моб)</small></td>
                        <td>
                            @if(empty(Auth::user()->phone))
                            не указанно
                            @else
                            {{Auth::user()->phone}}
                            @endif 
                        </td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td>
                            @if(empty(Auth::user()->adress))
                            не указанно
                            @else
                            {{Auth::user()->adress}}
                            @endif  
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   </div>
   <div class='order_box'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-send"></span> Мои aдресаты</div>
            <div class="panel-body">
                @if(Auth::user()->adresats->count() > 0)
                <table class='table table-striped table-condensed'>
                @foreach(Auth::user()->adresats as $adresat)
                   <tr>
                     <td>{{$adresat->name}} {{$adresat->surname}}</td>
                     <td>
                         <a href="{{url('/cabinet/adresat/edit')}}/{{$adresat->id}}"><span class="glyphicon glyphicon-cog"></span></a>
                         <a class='link but_del' id="adr{{$adresat->id}}"><span class="glyphicon glyphicon-remove"></span></a>
                         <div class='del'>
                            <a class='link' href="{{url('/cabinet/adresat/del')}}/{{$adresat->id}}">да</a>/
                            <a class='link no'>нет</a>
                         </div>
                     <td>  
                   </tr>
                @endforeach
                </table>
                @else
                 У вас еще нет адресатов 
                @endif
            </div>
        </div>    
   </div>
   <div class='orders_box'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-paperclip"></span> Заказы</div>
            <div class="panel-body">   
                <table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                           <th>ID</th>
                           <th>Статус</th>
                           <th>Дата Доставки</th>
                           <th>Сумма</th>
                           <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth::user()->orders as $order)
                           <tr>
                             <td>{{$order->id}}</td>
                             <td>
                                 @if($order->status==0) оформляется @endif
                                 @if($order->status==1) ожидание оплаты @endif
                                 @if($order->status==2) ожидание доставки @endif
                                 @if($order->status==3) Выполнен @endif
                             </td>
                             <td>{{$order->datetime}}</td>
                             <td class="rub">{{$summs[$order->id]}} &#8381;</td>
                             <td>
                                 <a title='Подробнее' href="{{url('/order/show')}}/{{$order->id}}"><span class="glyphicon glyphicon-search"></span></a>
                                 @if($order->status==0)
                                    @if($order->step==1)
                                    <a href="{{url('/order/step/one')}}/{{$order->id}}">продолжить оформление</a>
                                    @endif
                                    @if($order->step==2)
                                    <a href="{{url('/order/step/two')}}/{{$order->id}}">продолжить оформление</a>
                                    @endif
                                    @if($order->step==3)
                                    <a href="{{url('/order/step/three')}}/{{$order->id}}">продолжить оформление</a>
                                    @endif
                                    @if($order->step==4)
                                    <a href="{{url('/order/step/four')}}/{{$order->id}}">продолжить оформление</a>
                                    @endif 
                                 @endif
                                 @if($order->status==1) <a title="Оплатить" href="#"><span class="glyphicon glyphicon-credit-card"></a> @endif
                             </td>  
                           </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
        </div>    
   </div>
<!--модалки-->
    <div class="hidden modal-div"></div>
    @include('modal.cabinet.addAdresat')
    @include('modal.cabinet.editProfile')
    @include('modal.cabinet.editPassword')
<!--конец модалок-->
@endsection
@section('right')
 @include('blocks.cabinet_option')
@endsection