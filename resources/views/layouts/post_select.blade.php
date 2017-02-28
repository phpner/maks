<div class="row ajaxItems">
    @if(isset($items))
        @foreach($items as $item)
            <div class="col md-12 items clearfix">
                @if(isset($item->img_link))
                    <div class="thumbnail">
                        <a class="img_popup" href="/uploads/{{$item->img_link}}">
                            <img src="/uploads/_thumb_{{$item->img_link}}" alt="">
                        </a>
                    </div>
                @endif
                <div class="title"><h4>{{$item->title}}</h4></div>
                <div class="description"><h5>{{$item->description}}</h5></div>
                <div class="delivery"><span class="price">{{$item->price}}</span></div>
            </div>
        @endforeach
    @endif
    <div id="pagination">
        {{$items->render()}}
    </div>
    </div>

</div>
