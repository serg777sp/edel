@extends('layouts.adminmain')

@section('left')
<div class="panel panel-warning">
    <div class="panel-heading"><span class="glyphicon glyphicon-ok"></span> Каталог</div>
    <div class="panel-body">  
        <ul class='catalog_list'>
            @if(!empty($catalog['cat-s']))      
                @foreach($catalog['cat-s'] as $cat)
                <li class='catalog_list_el'>
                    {{ $cat['name'] }}
                    <a class='smalltext' href="/admin/catalog/edit/categorie/{{$cat['id']}}">редактировать</a>
                    <a class='smalltext but_del' id="{{$cat['id']}}{{$cat['id']}}">удалить</a>
                    <div class='del'>
                        Вы хотите удалить {{$cat['name']}}?
                        <a class='smalltext' href="/admin/catalog/destroy/categorie/{{$cat['id']}}">да</a>/
                        <a class='smalltext no'>нет</a>
                    </div>
                    <ul class='catalog_sub_list'>
                    @foreach($catalog['sub-s'] as $sub)                                  
                       @if($cat['id'] == $sub['categorie_id'])
                            <li class='catalog_sub_list_el'>
                                {{ $sub['name'] }}
                                <a class='smalltext' href="/admin/catalog/edit/subcategorie/{{$sub['id']}}">редактировать</a>
                                <a class='smalltext but_del' id="sub{{$sub['id']}}">удалить</a>
                                <div class='del'>
                                   Вы хотите удалить {{$sub['name']}}?
                                   <a class='smalltext' href="/admin/catalog/destroy/subcategorie/{{$sub['id']}}">да</a>/
                                   <a class='smalltext no'>нет</a>
                                </div>
                            </li>
                       @endif
                    @endforeach
                    </ul>
                </li>
                @endforeach
            @else
                <h4>В каталоге нет ни одной категории</h4>
            @endif   
        </ul>
    </div>
</div>    
@endsection
@section('right')
@include('blocks.catalog_options')
<p>Вид каталога</p><br>
@include('blocks.catalog')
@endsection