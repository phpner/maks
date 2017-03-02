@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <form action="/get" method="post">
                <div id="select">
                <select name="cate" >
                    <option value="0">Все</option>
                    <option value="1">пакет майка</option>
                    <option value="2">фасовочные пакеты</option>
                    <option value="3">мусорные пакеты</option>
                </select>
                </div>
            </form>
        </div>
        <div class="row ajaxItems">
            @if(isset($items))
                @foreach($items as $item)
                    <div class="col md-12 items clearfix">
                        @if(isset($item->img_link))
                            <div class="thumbnail">
                                <a data-title="{{$item->title}}"  data-lightbox="roadtrip" href="/uploads/{{$item->img_link}}">
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
@endsection
@section('script')
    <script>
        $(function () {
            var sel;

            $('#select select').on('change', function () {
                var id = $(this).val();
                 window.sel = $(this).val();
                $.ajax({
                    url: '/get/select',
                    method: "get",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {'id': id, }
                }).done(function (data){
                    $('.ajaxItems').html(data);
                    location.hash = '';
                }).fail(function (jqXHR, exception) {
                });
            });

           $(document).on('click','#pagination_select .pagination a',function (e){
                e.preventDefault();

                var cat = window.sel;
                var id = $(this).attr('href').split('page=')[1];
                $.ajax({
                    url:'/get/select?page=' + id +'&id='+ cat
                }).done(function (data){

                    $('.ajaxItems').html(data);

                });
            });
        });

    </script>
@endsection