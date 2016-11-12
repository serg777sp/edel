@if($item['viewtype']==0)
<div class='prices'>
 Цены
 <hr>
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
{{$prices[$i]}}
@else
нет
@endif">&#8381;
     </div>
@endfor        
     <button type='submit'>Изменить цены</button>
     <input type="hidden" name="_token" value="{{csrf_token()}}">
     <input type="hidden" name='item_id' value="{{$item['id']}}">
 </form>   
</div>
@else
<div class='editprice'>
 Цены
 <hr>
 <form class='form' method='post' action="{{url('/admin/item/edit/price/1')}}">
@for ($i = 50; $i < 120; $i+=10)
     <div>
        @if(!empty($prices[$i]))
           <a href="{{url('/admin/item/del/price')}}/{{$i}}/{{$item['id']}}">Удалить</a>
        @endif   
        {{$i}} см - <input maxlength='8' name='{{$i}}' class='admprice' type='text' 
        placeholder="
@if(!empty($prices[$i]))
{{$prices[$i]}}
@else
нет
@endif">&#8381;
     </div>  
@endfor               
     <button type='submit'>Изменить цены</button>
     <input type="hidden" name="_token" value="{{csrf_token()}}">
     <input type="hidden" name='item_id' value="{{$item['id']}}">
 </form>   
</div> 
@endif
