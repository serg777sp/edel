 <div class="catalog">
    <h4>Сортировка заказов</h4>
    <div id='cssmenu'>
        <ul>
           <li><a class='clearlink sortOrders' data-type='1' href="{{ url('admin/orders?orderType=all') }}">Все заказы</a></li>
           <li><a class='clearlink sortOrders' data-type='2' href="{{ url('admin/orders?orderType=2') }}">Не оплаченные</a></li>   
           <li><a class='clearlink sortOrders' data-type='3' href="{{ url('admin/orders?orderType=3') }}">Активные</a></li>
           <li><a class='clearlink sortOrders' data-type='4' href="{{ url('admin/orders?orderType=4') }}">Выполненые</a></li>
        </ul>
    </div>    
 </div>