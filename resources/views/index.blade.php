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
            <div id="pagination">
            {{$items->render()}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('#select select').on('change', function () {
                var id = $(this).val();
                $.ajax({
                    url: '/get/select',
                    method: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {'id': id, }
                }).done(function (data){
                    $('.ajaxItems').html(data);
                    location.hash = '';
                    console.log('rrr');
                }) .fail(function (jqXHR, exception) {
                    console.log(exception);
                });
            });

            $(document).on('click','#pagination .pagination a',function (e){
                e.preventDefault();
                var id = $(this).attr('href').split('page=')[1];
                $.ajax({
                    url:'/get?page='+id
                }).done(function (data) {

                    $('.ajaxItems').html(data);

                    location.hash = 'page=' + id;

                    });
            });

            $(document).on('click','#pagination_select .pagination a',function (e){
                e.preventDefault();
                var id = $(this).attr('href').split('page=')[1];
                $.ajax({
                    url:'/get?page='+id
                }).done(function (data) {

                    $('.ajaxItems').html(data);

                    location.hash = 'page=' + id;

                });
            });

        });

    </script>
@endsection