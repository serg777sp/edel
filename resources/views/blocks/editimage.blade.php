<div class="panel panel-warning">
    <div class="panel-heading"><span class="glyphicon glyphicon-apple"></span> Редактирование фотографий</div>
    <div class="panel-body">
        @if($item->viewtype === 0)
            @foreach($imgs as $img)
                @if(!empty($img->img_url))
                    <button id="changeform{{$img->size}}" class="btn btn-warning show_image_form">Изменить {{$img->getSizeName()}}</button>
                @else
                    <button id="addingform{{$img->size}}" class="btn btn-warning show_image_form">Добавить {{$img->getSizeName()}}</button>
                @endif
            @endforeach
        @else
            @foreach($item->getPhotos() as $img)
                <button id="changeform{{$img->size}}" class="btn btn-warning show_image_form">Изменить {{$img->getSizeName()}}</button>
            @endforeach
            @if($item->getPhotos()->count() < 3 && $item->getFreePropsCount() > 0 )
                <button id="addingform" class="btn btn-warning show_image_form">Добавить фото</button>
            @endif
        @endif
<!--Forms-->
@for ($i=1; $i < 4; $i++)
<div class='changeform{{$i}} hidden_block change_form'>
    <form class='form' enctype='multipart/form-data' method='post' action="{{url('/admin/item/photo/update')}}">
        <input class="form-control" type='file' name='foto'>
        <button class="btn btn-default" type='submit'>Изменить фото</button>
        <button class='reset btn btn-default' type='reset'>сбросить</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="item_id" value="{{$item['id']}}">
        <input type="hidden" name="size" value="{{$i}}">
    </form>
</div>
@endfor
@for ($i=1; $i < 4; $i++)
<div class='addingform{{$i}} hidden_block add_form'>
    <form class='form' enctype='multipart/form-data' method='post' action="{{url('/admin/item/addphoto')}}">
        <input class="form-control" type='file' name='foto'>
        <button class="btn btn-default" type='submit'>Добавить фото</button>
        <button class='reset btn btn-default' type='reset'>сбросить</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="item_id" value="{{$item['id']}}">
        <input type="hidden" name="size" value="{{$i}}">
    </form>
</div>
@endfor
<div class='addingform hidden_block add_form'>
    <form class='form' enctype='multipart/form-data' method='post' action="{{url('/admin/item/addphoto')}}">
        <input class="form-control" type='file' name='foto'>
        <button class="btn btn-default" type='submit'>Добавить фото</button>
        <button class='reset btn btn-default' type='reset'>сбросить</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="item_id" value="{{$item['id']}}">
        <input type="hidden" name="size" value="{{$item->getRandomSizeWithoutPhoto()}}">
    </form>
</div>
    </div>
</div>

