<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>
        <meta charset="UTF-8">
        <meta name="_token" content="{!! csrf_token() !!}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/slider.css') }}">
        <link rel="stylesheet" href="{{ asset('css/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
      <!--  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.css') }}">-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
    </head>
    <body>
    <!-- модалки на вход и регистрацию --> 
        <!-- Модалка на вход -->
        <div id='login-modal' class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Заголовок модального окна -->
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-black">Вход</h4>
                    </div>
                <!-- Основное содержимое модального окна -->
                    <div class="modal-body text-black">
                        <div class="container">
                            <form class="form-signin form-log" role="form"  method="POST" action="{{ url('/login') }}">
                            <h2 class="form-signin-heading">Заполните форму</h2>
                            <input type="email" class="form-control" name='email' placeholder="Email address"> <!-- required autofocus> -->
                            <input type="phone" class="form-control" name='phone' placeholder="Phone">
                            <input type="password" class="form-control" name='password' placeholder="Password" required>
                           <!-- <label class="checkbox">
                                <input type="checkbox" value="remember-me"> Remember me
                            </label> -->
                            <button class="btn btn-lg btn-warning btn-block" type="submit">Вход</button>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>
                        </div>
                     <!--   </div>
                     Футер модального окна -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- конец модалки -->
        <!-- Модалка на регистрацию -->
        <div id='register-modal' class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Заголовок модального окна -->
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-black">Регистрация</h4>
                    </div>
                <!-- Основное содержимое модального окна -->
                    <div class="modal-body text-black">
                        <div class="container">
                            <form class="form-signin form-log" role="form"  method="POST"  action="{{ url('/register') }}">
                                <h2 class="form-signin-heading">Заполните форму</h2>
                                <small>Поле телефон можно оставить пустым если заполнено поле email и наоборот. Эти данные будут использоваться для входа на сайт. Остальные поля обязательны к заполнению</small>                               
                                <input class='form-control' name="name" type='text' placeholder="Имя" required autofocus>
                                <input class='form-control' name='phone' type='tel' placeholder="Номер моб. телефона"> 
                                <input class='form-control' name="email" type='email' placeholder="Email">
                                <input class='form-control' name='password' type='password' placeholder="Password" required>
                                <input class='form-control' name="password_confirmation" type='password' placeholder="Confirm password" required>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button class="btn btn-warning btn-block" type='submit'>Зарегистрироваться</button>                            
                            </form> 
                        </div>
                     <!--   </div>
                     Футер модального окна -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- конец модалки -->
    <!-- модалки на вход и регистрацию -.-.- конец модалок -->     
        <div class='main'>
            <!--Контент Шапки--> 
            <div class="head">                
                <div class='phones'>
                    <img src="{{ asset('img/phone.png') }}">
                    <p>{{$sets['phone1']}}<br>
                    {{$sets['phone2']}}</p>
                    <a href="{{ url('/reqcall')}}">Заказать звонок</a>
                </div>
                <div class="inexit">                
                    <!-- Ссылки Блока вход/выход -->
                    
                    @if (Auth::guest())
                        <a class='link in o' id='log'>Вход</a>
                        <a class='link reg o' id='reg'>Регистрация</a>
                    @else
                    <div class='usermenu btn-group'>
                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle myUserMenu">
                        {{Auth::user()->getFIO()}}
                        <span class="caret"></span></button>    
                        <ul class='dropdown-menu'>
                            <li><a href="{{ url('/cabinet') }}">Личный кабинет</a></li>
                            @if(Auth::user()->isAdmin())
                            <li><a href="{{ url('/admin') }}">Админ-зона</a></li>
                            @endif 
                            <li><a href="{{ url('/basket') }}">Корзина</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}">Выход</a></li>
                        </ul>
                    </div>                            
                    @endif                                       
                </div>
                <div class="basket" id="bas_box">
                   @include('basket.box')
                </div>
                <a href="{{ url('/') }}"><img class='logotype' src="{{asset('img/logotype.png')}}"></a>
                <ul class="menu">
                    <a class='b_1' href="{{ url('/') }}"><li>Главная</li></a>
                    <a class='b_2' href="{{ url('/oplata') }}"><li>Оплата</li></a>
                    <a class='b_3' href="{{ url('/dostavka') }}"><li>Доставка</li></a>
                    <a class='b_4' href="{{ url('/working') }}"><li>Условия работы</li></a>
                    <a class='b_5' href="{{ url('/garant') }}"><li>Гарантии</li></a>
                    <a class='b_6' href="{{ url('/about') }}"><li>О нас</li></a>
                </ul>   
            </div>
            <!--Слайдер-->
            <div class="slider-container" id="slider-container">             
	           <div class="slider">
		          <div class="slide sl1">
                    <div class='sl img1'></div>  
                    <span>{{$sets['slide1']}}</span>
		          </div>
		          <div class="slide sl2">
                    <div class='sl img2'></div>  
                    <span>{{$sets['slide2']}}</span>
		          </div>
		          <div class="slide sl3">
                    <div class='sl img3'></div>
                    <span>{{$sets['slide3']}}</span>  
		          </div>
                  <div class="slide sl4">
                    <div class='sl img4'></div>
                    <span>{{$sets['slide4']}}</span>
		          </div>
	           </div>
	           <div class="switch" id="prev"><span></span></div>
	           <div class="switch" id="next"><span></span></div>
            </div>
            <!--Конец шапки-->
            <!--Средина сайта-->
            <div class='middle'>
                <div class='page_title'>
                    <span>{{$page_title}}</span><span class="cat-sort"></span><span class="sub-sort"></span>
                </div>
                <div class="content">
                    <div class="left">
                        @if(!empty(Session::get('message')))
<!--                            <div class='message'>{{Session::get('message')}}</div>-->
                            <div class='alert alert-with-margin alert-danger'>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{Session::get('message')}}
                            </div> 
                        @endif
                        @if (count($errors) > 0)
                            <div class='alert alert-with-margin alert-danger'>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>    
                        @endif
                        <div class='line'></div> 
                            @yield('left')
                    </div>
                    <div class="right">
                        @yield('right')
                    </div>
                </div>
            </div>
            <!--Конец середине-->
            <!--Подвал-->
            <div class="footer">
                <div class='foot_content'>
                    <div class='foot_box'>
                        <h4>Помощь по сайту</h4>
                        <ul>
                            <li>Карта сайта</li>
                            <li>Как заказать</li>
                            <li>Как оплатить</li>
                            <li>Личный кабинет</li>
                            <li>Скидки и акции</li>
                        </ul>
                    </div>
                    <div class='foot_box'>
                        <h4>Помощь по сайту</h4>
                        <ul>
                            <li>Карта сайта</li>
                            <li>Как заказать</li>
                            <li>Как оплатить</li>
                            <li>Личный кабинет</li>
                            <li>Скидки и акции</li>
                        </ul>
                    </div>
                    <div class='foot_box'>
                        <h4>Помощь по сайту</h4>
                        <ul>
                            <li>Карта сайта</li>
                            <li>Как заказать</li>
                            <li>Как оплатить</li>
                            <li>Личный кабинет</li>
                            <li>Скидки и акции</li>
                        </ul>
                    </div>
                    <div class='copyright'>© 2016 Цветочныйй салон «Эдельвейс»</div>
                </div>
                <div class='my_self'>Created Posunko Sergey</div>
            </div>
        </div>

    <!--Скрипты js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/slider.js')}}"></script>
    <script src="{{asset('js/myjs.js')}}"></script>
<!--    <script type="text/javascript" src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>-->
    <script type="text/javascript" src="{{asset('/bower_components/moment/min/moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
	$("#slider-container").sliderUi({
        delay: 5000,
		speed: 1500,
        controlShow: false,
		cssEasing: "cubic-bezier(0.285, 1.015, 0.165, 1.000)"
	});
	$("#caption-slide").sliderUi({
		caption: true
	});
    </script>
    </body>
</html>