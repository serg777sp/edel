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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.css') }}">        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/media.css') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
    </head>
    <body>
        <div class='main'>
            <!--Контент Шапки--> 
            <div class="adminhead"> 
                <div class="inexit">                
                    <!-- Ссылки Блока вход/выход -->
                    @if (Auth::guest())
                        <a class='link in o' id='log'>Вход</a>
                        <a class='link reg o' id='reg'>Регистрация</a>
                    @else
                    <div class='usermenu btn-group'>
                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle myAdmMenu">
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
                <a href="{{ url('/') }}"><img class='admlogo' src="{{ asset('img/logotype.png') }}"></a>
                <ul class="admmenu">
                    <a class='b_1' href="{{ url('/admin') }}"><li>Статистика</li></a>
                    <a class='b_2' href="{{ url('/admin/catalog') }}"><li>Каталог</li></a>
                    <a class='b_3' href="{{ url('/admin/showcase') }}"><li>Витрина</li></a>
                    <a class='b_4' href="{{ url('/admin/orders') }}"><li>Заказы</li></a>
                    <a class='b_5' href="{{ url('/admin/users')}}"><li>Пользователи</li></a>
                    <a class='b_6' href="{{ url('/admin/settings') }}"><li>Настройки</li></a>
                </ul>   
            </div>
            <!--Слайдер-->
            <div class="slider-container" id="slider-container">             
	           <div class="slider">
		          <div class="slide sl1">
                    <div class='admsl img1'></div>  
		          </div>
		          <div class="slide sl2">
                    <div class='admsl img2'></div>  

		          </div>
		          <div class="slide sl3">
                    <div class='admsl img3'></div>
  
		          </div>
                  <div class="slide sl4">
                    <div class='admsl img4'></div>
		          </div>
	           </div>
            </div>
            <!--Конец шапки-->
            <!--Средина сайта-->
            <div class='middle'>
                <div class='page_title'>
                    <span>{{$page_title}}</span>
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