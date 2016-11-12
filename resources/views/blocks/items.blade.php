@if(count($items) > 0)
    @foreach($items as $item)
      @if($item->viewtype == 0)
         @include('blocks.itemBuk')
      @else
         @include('blocks.itemSin')
      @endif
    @endforeach
@else
    <div class='alert alert-with-margin alert-warning'>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Не нашлось =(
    </div>  
@endif