<div class="panel panel-warning">
    <div class="panel-heading"><span class="glyphicon glyphicon-apple"></span> Редактирование фотографий</div>
    <div class="panel-body">     
        @for ($i=0; $i < 3; $i++)
              @if(!empty($imgs[$i]))
                 @if($imgs[$i]->imgurl==$item['url'])
                 Главная - 
                 @endif
                 <button class="btn btn-warning"><span id="changeform{{$i}}" class='show_image_form'>Изменить фото 
                    @if($item['viewtype']==0)
                       @if($i==0)
                       малого букета
                       @endif
                       @if($i==1)
                       среднего букета
                       @endif
                       @if($i==2)
                       большого букета
                       @endif
                    @else
                     № {{$i}}                    
                    @endif    
                     </span></button>   
              @else
                 <button class="btn btn-warning"><span id="addingform{{$i}}" class='show_image_form'>Добавить фото
                    @if($item['viewtype']==0)
                       @if($i==0)
                       малого букета
                       @endif
                       @if($i==1)
                       среднего букета
                       @endif
                       @if($i==2)
                       большого букета
                       @endif
                    @else
                     № {{$i}}                    
                    @endif      
                 </span></button>
              @endif  
       @endfor
@for ($i=0; $i < 3; $i++)
<div class='changeform{{$i}} hidden_block change_form'>
    <form class='form' enctype='multipart/form-data' method='post' action="{{url('/admin/item/photo/update')}}">
        <input class="form-control" type='file' name='foto'>
        <button class="btn btn-default" type='submit'>Изменить фото</button>
        <button class='reset btn btn-default' type='reset'>сбросить</button>
         @if(!empty($imgs[$i]))
            @if($imgs[$i]==$item['url'])
            <input type='hidden' name='imp' value='true'>
            @else
            <input type='hidden' name='imp' value='false'>
            @endif
         @endif
         <input type="hidden" name="_token" value="{{csrf_token()}}">
         <input type="hidden" name="item_id" value="{{$item['id']}}">
         <input type="hidden" name="razmer" value="{{$i}}">
         <input type="hidden" name="viewtype" value="{{$item['viewtype']}}">  
    </form>
</div>
@endfor
@for ($i=0; $i < 3; $i++)
<div class='addingform{{$i}} hidden_block add_form'>
    <form class='form' enctype='multipart/form-data' method='post' action="{{url('/admin/item/addphoto')}}">
        <input class="form-control" type='file' name='foto'>
        <button class="btn btn-default" type='submit'>Добавить фото</button>
        <button class='reset btn btn-default' type='reset'>сбросить</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="item_id" value="{{$item['id']}}">
        <input type="hidden" name="razmer" value="{{$i}}">
        <input type="hidden" name="viewtype" value="{{$item['viewtype']}}">  
    </form>
</div>
@endfor
    </div>
</div>

