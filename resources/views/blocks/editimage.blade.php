<div class='editimage'>
Редактирование фотографий
<hr>
<div class='imgs_edit_links'> 
   @for ($i=1; $i < 4; $i++)
      <div> 
         @if(!empty($imgs[$i]))
            @if($imgs[$i]==$item['url'])
            Главная - 
            @endif
            <span id="changeform{{$i}}" class='show_image_form'>Изменить фото 
               @if($item['viewtype']==0)
                  @if($i==1)
                  малого букета
                  @endif
                  @if($i==2)
                  среднего букета
                  @endif
                  @if($i==3)
                  большого букета
                  @endif
               @else
                № {{$i}}                    
               @endif    
            </span>   
         @else
            <span id="addingform{{$i}}" class='show_image_form'>Добавить фото
               @if($item['viewtype']==0)
                  @if($i==1)
                  малого букета
                  @endif
                  @if($i==2)
                  среднего букета
                  @endif
                  @if($i==3)
                  большого букета
                  @endif
               @else
                № {{$i}}                    
               @endif      
            </span>
         @endif 
      </div>   
  @endfor 
</div>
@for ($i=1; $i < 4; $i++)
<div class='changeform{{$i}} hidden'>
    <form class='form' enctype='multipart/form-data' method='post' action="{{url('/admin/item/photo/update')}}">
        <input type='file' name='foto'>
        <button type='submit'>Изменить фото</button>
        <button class='reset' type='reset'>сбросить</button>
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
@for ($i=1; $i < 4; $i++)
<div class='addingform{{$i}} hidden'>
    <form class='form' enctype='multipart/form-data' method='post' action="{{url('/admin/item/addphoto')}}">
        <input type='file' name='foto'>
        <button type='submit'>Добавить фото</button>
        <button class='reset' type='reset'>сбросить</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="item_id" value="{{$item['id']}}">
        <input type="hidden" name="razmer" value="{{$i}}">
        <input type="hidden" name="viewtype" value="{{$item['viewtype']}}">  
    </form>
</div>
@endfor
</div>