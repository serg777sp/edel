@if($item['viewtype']==0)
<div class='col-lg-6 prices'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-apple"></span> Цены</div>
            <div class="panel-body">
                <form class='form' method='post' action="{{url('/admin/item/edit/price/0')}}">
                @for ($i = 1; $i < 4; $i++)
                    <div>
                        @if(!empty($item->getPriceBySize($i)))
                            @if($i==1) Маленький @endif
                            @if($i==2) Средний @endif
                            @if($i==3) Большой @endif
                            размер<input maxlength='8' name='{{$i}}' class='admprice' type='text' value="{{$item->getPriceBySize($i)->price}}">&#8381;
                        @else
                                                        @if($i==1) Маленький @endif
                            @if($i==2) Средний @endif
                            @if($i==3) Большой @endif
                            размер<input maxlength='8' name='{{$i}}' class='admprice' type='text'">&#8381;
                        @endif
                    </div>
               @endfor
               <button class="btn btn-success" type='submit'>Изменить цены</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name='item_id' value="{{$item['id']}}">
                </form>
            </div>
        </div>
    </div>
@else
<div class='col-lg-6 prices'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-apple"></span> Цены</div>
            <div class="panel-body">
                <form class='form' method='post' action="{{url('/admin/item/edit/price/1')}}">
                @for ($i = 50; $i < 120; $i += 10)
                    <div>
                       @if(!empty($item->getPriceBySize($i)))
                            {{$i}} см - <input maxlength='8' name='{{$i}}' class='admprice' type='text' value="{{$item->getPriceBySize($i)->price}}">&#8381;
                       @else
                           {{$i}} см - <input maxlength='8' name='{{$i}}' class='admprice' type='text' value="нет">&#8381;
                       @endif
                    </div>
                @endfor
                <button class="btn btn-success" type='submit'>Изменить цены</button>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name='item_id' value="{{$item['id']}}">
                </form>
            </div>
        </div>
</div>
@endif
