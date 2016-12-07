<img class='bigfoto' src="/img/original/{{$item->getImageName()}}">
<div class='itemProps sh'>
    <div class="panel panel-warning">
        <div class="panel-heading"><small>Размер букета</small></div>
        <div class="panel-body">
            @foreach($item->getPrices() as $price)
               <div>
                  @if($price->razmer === 1) <button class="btn btn-default btn-block selectSize" data-size='{{$price->razmer}}'>Малый</button> @endif
                  @if($price->razmer === 2) <button class="btn btn-default btn-block selectSize" data-size='{{$price->razmer}}'>Средний</button> @endif
                  @if($price->razmer === 3) <button class="btn btn-default btn-block selectSize" data-size='{{$price->razmer}}'>Большой</button> @endif
                  <input type='hidden' value='{{$price->price}}'>
               </div>
            @endforeach
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
                    <td id='currentPrice'>{{$item->getFirstPriceValue()}}</td>
                </tr>
                <tr>
                    <td>Размер</td>
                    <td id='currentSize'>{{$item->getFirstSizeName()}}</td>
                </tr>
            </table>
            <form class='form' method="post" action="{{url('/basket/add')}}">
                <input type="hidden" id="form_item" name='item_id' value="{{$item->id}}">
                <input type="hidden" id='form_user' if name='user_id' value="{{Auth::user()->id}}">
                <input type="hidden" id='form_razmer' name='razmer' value="{{$item->getFirstSize()}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="button" class="btn btn-block card_button2_color easyAdd">В корзину</button>
            </form>
            <a href="{{ url('/')}}">
                <button class="btn btn-block btn-warning">Назад</button>
            </a>
        </div>
    </div>
</div>
<div class="hidden_block">
    @foreach($item->getPhotos() as $photo)
    <input type="hidden" id='photo_razmer{{$photo->size}}' value='{{$photo->img_url}}'>
    @endforeach
</div>
<div class='description'>
    <div class="panel panel-warning">
        <div class="panel-heading">Описание</div>
        <div class="panel-body">
            {{$item['description']}}
        </div>
    </div>
</div>
