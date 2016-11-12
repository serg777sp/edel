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
                 <a href="{{url('/order/show')}}/{{$order->id}}">подробнее</a><br>
                 <a href="#">редактировать</a><br>
                 @if($order->status==2) <a href="#">доставлено<br></a> @endif
                 <a href="#">удалить</a>
                 <span class="glyphicon glyphicon-star"></span>
             <td>  
           </tr>
        @endforeach
        </table>
    </div>
</div>
{{$orders->render()}}