<div class='item_form withborder'>
Основные
<hr><br>    
                    <form class='form' method='post' enctype='multipart/form-data' action="{{url('admin/showcase/edit')}}">
                       <div>
                          Категория:
                          <select id='cat' name='cat'>
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
                          <select id="id{{$cat['id']}}" class='subhid'>
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
                          Имя:
                          <input id='item_name' type='text' name='name' placeholder="{{$item['name']}}">
                       </div>
                       <div>   
                          Описание:<br><br>
                          <textarea name='description'>{{$item['description']}}</textarea>
                       </div>     
                       <button type='submit' name='button' value='Добавить'>Сохранить изменения</button>
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
