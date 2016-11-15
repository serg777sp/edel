@if($item['viewtype']==0)
<div class='col-lg-6 prices'>
        <div class="panel panel-warning">
            <div class="panel-heading"><span class="glyphicon glyphicon-apple"></span> Цены</div>
            <div class="panel-body">
                <form class='form' method='post' action="{{url('/admin/item/edit/price/0')}}">
                @for ($i = 1; $i < 4; $i++)
                    <div>
                       @if(!empty($prices[$i]))
                          <a href="{{url('/admin/item/del/price')}}/{{$i}}">Удалить</a>
                       @endif
                       @if($i==1) Малого @endif
                       @if($i==2) Среднего @endif
                       @if($i==3) Большого @endif
                       букета - <input maxlength='8' name='{{$i}}' class='admprice' type='text' 
                       placeholder="
@if(!empty($prices[$i]))
{{$prices[$i]->price}}
@else
нет
@endif">&#8381;
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
               @for ($i = 0; $i < 7; $i++)
                    <div>
                       @if(!empty($prices[$i]))
                          <a href="{{url('/admin/item/del/price')}}/{{$i}}/{{$item['id']}}">Удалить</a>
                       @endif   
                       @if($i===0) 50 @endif @if($i===1) 60 @endif @if($i===2) 70 @endif @if($i===3) 80 @endif
                       @if($i===4) 90 @endif @if($i===5) 100 @endif @if($i===6) 110 @endif                 
                       см - <input maxlength='8' name='{{$i}}' class='admprice' type='text' 
                       placeholder="
@if(!empty($prices[$i]))
{{$prices[$i]->price}}
@else
нет
@endif">&#8381;
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
