<div class="row">
    @if(isset($items))
        @foreach($items as $item)
            <div class="col md-12 items clearfix">
                <div class="thumbnail">
                    <a href="/uploads/{{$item->img_link}}">
                        <img src="/uploads/_thumb_{{$item->img_link}}" alt="">
                    </a>
                </div>
                <div class="title"><h4>{{$item->title}}</h4></div>
                <div class="description"><h5>{{$item->description}}</h5></div>
                <div class="delivery"><h5><img src="/img/delivery.png" alt="">&nbsp;{{$item->delivery}}</h5></div>
            </div>
        @endforeach
    @endif
    <div id="pagination_select">
        {{$items->render()}}
    </div>
</div>
