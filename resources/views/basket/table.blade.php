<div class="panel panel-warning">
  <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> Заказ</div>
  <div class="panel-body">
    @if(Auth::user()->baskets->count() > 0 )
    <table class='table table-bordered table-striped table-hover'>
         <thead>
             <tr>
                 <th>Название</th>
                 <th>Количество</th>
                 <th>Размер/длина</th>
                 <th>Цена</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
             @foreach(Auth::user()->baskets as $basket)
             <tr>
                 <td>{{$basket->item->name}}</td>
                 <td>
                     @if(empty($basket->kolvo))
                     1
                     @else
                     {{$basket->kolvo}}
                     @endif
                 </td>
                 <td>{{$basket->op_val}}</td>
                 <td>{{$basket->end_price}}</td>
                 <td>
                     <a class='deleteBasket' title='удалить' href="{{ url('/basket/delete/') }}/{{$basket['id']}}">
                             <span class="glyphicon glyphicon-remove"></span>
                     </a>
                 </td>
             </tr>    
             @endforeach
         </tbody>    

    </table>
    <div class='sum_box'>
     <b>Итого - {{Auth::user()->getOrderSumma()}} &#8381;</b>
     <a href="{{url('/order/step/one')}}"><button class="btn btn-success btn-lg" type='button'>Оформить заказ</button></a>   
    </div>       
    @else
    У вас нет в козине товаров         
    @endif
  </div>
</div> 

