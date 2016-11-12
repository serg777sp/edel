    <div class='item_img_but'>
       @if(!empty($imgs[1]))
         <div id="{{$imgs[1]}}" class='showphoto'>
           @if($item['viewtype'] == 0)
           Фото малого букета
           @else 
           Фото 1
           @endif
         </div>
       @else
          @if($item['viewtype'] == 0)
             <div class='showform'>Добавить фото малого букета</div>
             <form method='post' enctype='multipart/form-data' action="{{ url('admin/item/addphoto') }}/">
                <input type='file' name='foto'>
                <input type='submit' value='Добавить'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="item_id" value="{{$item['id']}}">
                <input type="hidden" name="razmer" value="1">
                <input type="hidden" name="viewtype" value="{{$item['viewtype']}}"> 
             </form>
          @else
             <div class='showform'>Добавить фото</div>
             <form method='post' enctype='multipart/form-data' action="{{ url('admin/item/addphoto') }}">
                <input type='file' name='foto'>
                <input type='submit' value='Добавить'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="item_id" value="{{$item['id']}}">
                <input type="hidden" name="razmer" value="0">
                <input type="hidden" name="viewtype" value="{{$item['viewtype']}}"> 
             </form>
          @endif
       @endif
    </div>
    <div class='item_img_but'>
       @if(!empty($imgs[2]))
       <div id="{{$imgs[2]}}" class='showphoto'>
           @if($item['viewtype'] == 0)
           Фото среднего букета
           @else 
           Фото 2
           @endif
       </div>
       @else
          @if($item['viewtype'] == 0)
             <div class='showform'>Добавить фото среднего букета</div>
             <form method='post' enctype='multipart/form-data' action="{{ url('admin/item/addphoto') }}">
                <input type='file' name='foto'>
                <input type='submit' value='Добавить'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="item_id" value="{{$item['id']}}">
                <input type="hidden" name="razmer" value="2">
                <input type="hidden" name="viewtype" value="{{$item['viewtype']}}"> 
             </form>
          @else
             <div class='showform'>Добавить фото</div>
             <form method='post' enctype='multipart/form-data' action="{{ url('admin/item/addphoto') }}">
                <input type='file' name='foto'>
                <input type='submit' value='Добавить'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="item_id" value="{{$item['id']}}">
                <input type="hidden" name="razmer" value="0">
                <input type="hidden" name="viewtype" value="{{$item['viewtype']}}"> 
             </form>
          @endif
       @endif
    </div>
    <div class='item_img_but'>
       @if(!empty($imgs[3]))
       <div id="{{$imgs[3]}}" class='showphoto'>
           @if($item['viewtype'] == 0)
           Фото большого букета
           @else 
           Фото 3
           @endif
       </div>
       @else
          @if($item['viewtype'] == 0)
             <div class='showform'>Добавить фото большого букета</div>
             <form method='post' enctype='multipart/form-data' action="{{ url('admin/item/addphoto') }}">
                <input type='file' name='foto'>
                <input type='submit' value='Добавить'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="item_id" value="{{$item['id']}}">
                <input type="hidden" name="razmer" value="3">
                <input type="hidden" name="viewtype" value="{{$item['viewtype']}}"> 
             </form>
          @else
             <div class='showform'>Добавить фото</div>
             <form method='post' enctype='multipart/form-data' action="{{ url('admin/item/addphoto') }}">
                <input type='file' name='foto'>
                <input type='submit' value='Добавить'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="item_id" value="{{$item['id']}}">
                <input type="hidden" name="razmer" value="0">
                <input type="hidden" name="viewtype" value="{{$item['viewtype']}}"> 
             </form>
          @endif
       @endif
    </div>