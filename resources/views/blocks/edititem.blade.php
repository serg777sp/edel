<div class='col-lg-6'>
    <div class="panel panel-warning">
        <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span> Основные</div>
        <div class="panel-body">
            <form class='form' method='post' enctype='multipart/form-data' action="{{url('admin/showcase/edit')}}">
               <div>
                   <label>Категория:</label>
                    <select class="form-control" id='cat' name='cat'>
                      <option value='0' selected>нет</option>
                      @foreach($cats as $cat)
                         @if($cat['id'] == $item['cat_id'])
                            <option value="{{$cat['id']}}" selected>{{$cat['name']}}<option>
                         @else
                            <option value="{{$cat['id']}}">{{$cat['name']}}<option>
                         @endif
                      @endforeach
                    </select>
                  @foreach($cats as $cat)
                  <select id="id{{$cat['id']}}" class='form-control subhid {{$item->getCurrentSubClass($cat->id)}}'>
                      <option value='0' selected>Нет</option>
                      @foreach($subs as $sub)
                         @if($cat['id'] == $sub['categorie_id'])
                            @if($sub['id'] == $item['sub_id'])
                               <option value="{{$sub['id']}}" selected>{{$sub['name']}}</option>
                            @else
                               <option value="{{$sub['id']}}">{{$sub['name']}}</option>
                            @endif
                         @endif
                      @endforeach
                  </select>
                  @endforeach
               </div>
               <div>
                    <label>Имя:</label>
                    <input id='item_name' class="form-control" type='text' name='name' value="{{$item['name']}}">
               </div>
                <div>
                    <label>Описание:</label>
                    <textarea class="form-control" name='description'>{{$item['description']}}</textarea>
                </div>
                <button class="btn btn-success" type='submit' name='button' value='Добавить'>Сохранить изменения</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="item_id" value="{{$item['id']}}">
           </form><br>
           @if (count($errors) > 0)
           <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
             @endforeach
           </ul>
           @endif
        </div>
    </div>
</div>
