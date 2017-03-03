@extends('admin.admin')
@section('content')
    <div class="tansOfSettings">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#header" aria-controls="header" role="tab" data-toggle="tab">Шапка сайта</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">Пользователи</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="header">
            <div class="addImgSettings">
                <img class="settingsImg" src="/img/header.png" alt="">
            </div>

            <div class="col-md-12 text-center">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#imdChanch">
                    редактировать
                </button>
                <button type="button" class="btn btn-success btn-lg saveAjax">
                    Сохранить
                </button>
            </div>
            <div class="modal fade" id="imdChanch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Загрузка файлов</h4>
                        </div>
                        <div class="modal-body">


                            <div class="laradrop" laradrop-csrf-token="h0l6Y6hKeth7UzQDdGtKzScKzQGl22rO4Pw7Izf8"></div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div role="tabpanel" class="tab-pane" id="profile">Lorem ipsum dolor sit amet, .</div>
        <div role="tabpanel" class="tab-pane" id="messages">Lorem ipsum dolor sit , consectetur.</div>
        <div role="tabpanel" class="tab-pane" id="user">
         @include('admin.getUserToSettings')
        </div>
    </div>
    </div>
    @endsection
@section('script')
    <script>
        $(function () {
            $('.laradrop').laradrop({

                onInsertCallback: function (src) {
                    if ($('.addImgSettings img').is('#' + src.id)) {
                        alert('Такая картинка уже добавлена!');
                    } else {
                        $('.addImgSettings').html('<img  class="settingsImg" id=' + src.id + '  class="added" src=' + src.src + '>');

                        var img = src.src.slice(src.src.indexOf('b_') + 2);

                        $('#imdChanch').modal('toggle');
                    }

                },

                onErrorCallback: function (jqXHR, textStatus, errorThrown) {
                    alert('An error occured: ' + errorThrown);
                }
            });

            $('.saveAjax').on("click",function (){

                var img = $('.settingsImg').attr('src');

                $.ajax({
                    url: '/admin/settings/saveHeaher',
                    method: 'post',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: img
                }).done(function (data){

                    console.log(data);

                }).fail(function (err) {
                    console.log(err);
                });
            });



            $('#formRegFromSettings').on('submit',function (e) {

                e.preventDefault();

            var form = document.forms.formRegFromSettings;

            var gotForm = new FormData(form);

                var xhr = new XMLHttpRequest();

                xhr.open('POST','/admin/create',true);

                xhr.setRequestHeader( 'X-CSRF-TOKEN',$('meta[name="csrf-token"]').attr('content'));

                xhr.send(gotForm);

                xhr.onreadystatechange = function () {

                    if (xhr.readyState != 4) return false;

                    if(xhr.status != 200){
                        xhr.statusText;
                    }else{

                        try
                        {
                            var gotJson = JSON.parse(xhr.responseText);

                            $('.jsonUsers').html(' ');

                            gotJson.users.forEach(function (res) {
                                console.log(res);

                                $('.jsonUsers').append("<li>Имя "+
                                    res.name
                                    + " Пароль : **********" +
                                    "<a href=''> <span class='glyphicon glyphicon-remove '></span></a><br><hr> " +
                                    "</li>");

                            });

                            $('#reg').modal('toggle');
                        }
                        catch(e)
                        {
                            $('.errorsFails').html(xhr.responseText);
                        }

                        }
                }

            });



        });
    </script>
@endsection