<div class="row ajaxItems">
    @if(isset($items))
        @foreach($items as $item)
            <div class="col md-12 items clearfix">
                @if(isset($item->img_link))
                    <div class="thumbnail">
                        <a data-title="{{$item->title}}" data-lightbox="roadtrip" href="/uploads/{{$item->img_link}}">
                            <img src="/uploads/_thumb_{{$item->img_link}}" alt="{{$item->title}}">
                        </a>
                    </div>
                @endif
                <div class="title"><h4>{{$item->title}}</h4></div>
                <div class="description"><h5>{!! $item->description !!}</h5></div>
                    @if(isset($item->price))
                <div class="delivery"><span class="price">{{$item->price}}</span></div>
                        @endif
            </div>
        @endforeach
    @endif
    <div id="pagination">
        {{$items->render()}}
    </div>
    </div>

</div>
