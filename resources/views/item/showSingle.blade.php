<img class='bigfoto' src="/img/original/{{$item->getImageName()}}">

<div class='prices sh with-margin-top-15'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon">&#8381;</span> Цены</div>
        <div class="panel-body">
            <table class="table">
                @foreach($item->getPrices() as $price)
                    <tr>
                        <td>
                            <button class="btn btn-default btn-no-margin selectDlina" data-dlina='{{$price->dlina}}'>{{$price->dlina}} см</button>
                            <input type="hidden" value="{{$price->price}}">
                        </td>
                        <td> - {{$price->price}} &#8381;</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class='itemProps'>
    <div class="panel panel-warning">
    <!--        <div class="panel-heading"><span class="glyphicon glyphicon-send"></span> Цены</div>-->
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>Цена</td>
                    <td><span id='currentPrice'>{{$item->getFirstPrice()}}</span> &#8381;</td>
                </tr>
                <tr>
                    <td>Длина</td>
                    <td id='currentDlina'>{{$item->getFirstSize()}} cм</td>
                </tr>
                <tr>
                    <td>Количество</td>
                    <td id='currentCount'>
                        <button class="btn btn-xs btn-danger btn-with-horisontal-margin"><span class="glyphicon glyphicon-minus minusCount"></span></button>
                        <span class="currentCount">1</span>
                        <button class="btn btn-xs btn-success btn-with-horisontal-margin"><span class="glyphicon glyphicon-plus plusCount"></span></button>
                    </td>
                </tr>
            </table>
            <form class='form' method="post" action="{{url('/basket/add')}}">
                <input type="hidden" id="form_item" name='item_id' value="{{$item->id}}">
                <input type="hidden" id='form_user' if name='user_id' value="{{Auth::user()->id}}">
                <input type="hidden" id='form_dlina' name='dlina' value="{{$item->getFirstSize()}}">
                <input type='hidden' id='form_count' value='1'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="button" class="btn btn-block card_button2_color easyAdd">В корзину</button>
            </form>
            <a href="{{ url('/')}}">
                <button class="btn btn-block btn-warning">Назад</button>
            </a>
        </div>
    </div>
</div>

<div class='description des'>
    <div class="panel panel-warning">
        <div class="panel-heading">Описание</div>
        <div class="panel-body">
            {{$item['description']}}
        </div>
    </div>
</div>