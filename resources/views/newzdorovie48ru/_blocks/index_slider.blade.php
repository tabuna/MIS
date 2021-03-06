<div id="main-slider" class="main-slider carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($block->items as $key => $item)
            <li data-target="#main-slider" data-slide-to="{{ $key }}" class="{{ ($key == 0) ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">

        @foreach($block->items as $key => $item)
            <div class="item {{ ($key == 0) ? 'active' : '' }}">
                <img alt="Слайдер" src="{{ $item->avatar }}">

                <div class="carousel-caption text-black bg-white-opacity">
                    <a @if($item->link) href="{{$item->link}} @endif" class="slider_link">
                    {!! $item->text !!}
                    </a>


                </div>
            </div>
        @endforeach
    </div>
</div>
