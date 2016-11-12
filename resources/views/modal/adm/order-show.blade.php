<div class='order_box'>
       Данные пользователя совершившего заказ<hr>
       <p>Имя - {{$order->user->name}}</p>
       <p>Фамилия - 
          @if(empty($order->user->surname))
            не указанно
          @else
          {{$order->user->surname}}
          @endif   
       </p>
       <p>Email - {{$order->user->email}}</p>
       <p>Телефон - 
          @if(empty($order->user->phone))
            не указанно
          @else
          {{$order->user->phone}}
          @endif   
       </p>
       <p>Адрес - 
          @if(empty($order->user->adress))
            не указанно
          @else
          {{$order->user->adress}}
          @endif   
       </p>
   </div>
@include('blocks.order')
<div class='orders_box'>
    Товары входящие в заказ<hr>
       <table class='basket_table'>
       <tr>
           <th>Название</th>
           <th>Количество</th>
           <th>Размер/длина</th>
           <th>Цена</th>
       </tr>
       @foreach($order->orderItems as $item)
       <tr>
           <td>{{$item->item->name}}</td>
           <td>
               @if(empty($item->kolvo))
               1
               @else
               {{$item->kolvo}}
               @endif
           </td>
           <td>{{$item->op_val}}</td>
           <td>{{$item->end_price}}</td>
       </tr>    
       @endforeach 
   </table>
</div>