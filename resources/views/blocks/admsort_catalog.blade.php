<div class="catalog">
    <h4>Соритровка по каталогу</h4>
    <div id="cssmenu">
        <ul>
            @foreach($catalog['cat-s'] as $cat)
                @if($cat->subsCount() > 0)
                    <li class='has-sub'><a href="#" class='i-sort noLinks' data-type="cat" data-id='{{$cat["id"]}}'><span>{{ $cat['name'] }}</span></a>
                        <ul>
                            @foreach($cat->subs as $sub)
                            <li><a href="#" class="i-sort" data-type="sub" data-cat-id='{{$cat['id']}}' data-id='{{$sub["id"]}}'><span>{{ $sub['name'] }}</span></a></li>
                            @endforeach
                        </ul>
                    </li>       
                @else
                    <li>
                        <a href="#" class='i-sort noLinks' data-type='cat' data-id='{{$cat["id"]}}'><span>{{ $cat['name'] }}</span></a>
                    </li>
                @endif
            @endforeach
            <li>
                <a href="#" class='i-sort noLinks' data-type="cat" data-id='all'><span>Все товары</span></a>
            </li>    
        </ul>
    </div>
</div>