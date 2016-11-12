 <div class="catalog">
    <h4>Опции</h4>
    <div id="cssmenu">
        <ul>
           <li><a class='clearlink' href="{{ url('/cabinet') }}">Главная личного кабинета</a></li> 
           <li><a class='clearlink addAdresat' href="{{ url('/cabinet/adresat/add') }}">Добавить получателя</a></li>
           <li><a class='clearlink profileEdit' href="{{ url('/cabinet/edit') }}">Редактировать личные данные</a></li>
           <li><a class='clearlink editPassword' href="{{ url('/cabinet/edit') }}">Изменить пароль</a></li>
           @if(Auth::user()->id ===1)
           <li><a class='clearlink' href="{{ url('/admin') }}">Администрирование</a></li>
           @endif     
        </ul>
 </div>