@extends('admin.admin')
@section('content')
    <div class="tansOfSettings">
   
        <div id="header">
            @include('admin.tabs.settingHeaderTabs')
        </div>
    </div>
    @endsection
@section('script')
    <script>
        $(function () {
            $('.imdClick').on("click",function(){
                 $('.laradrop-container').laradrop.destroy();
                $('.imdChanch').laradrop({
                         onInsertCallback: function (src) {
                    if ($('.addImgSettings img').is('#' + src.id)) {
                        alert('Такая картинка уже добавлена!');
                    }else {
                        var img = src.src.slice(src.src.indexOf('b_') + 2);
                        $('.header').html('<img  class="settingsImg" id=' + src.id + '  class="added" src=/uploads/' + img + '>');
                        $('#imdChanch').modal('toggle');

                    }

                }
            });
            });
            
     $('.logoClick').on("click",function(){
         $('.laradrop-container').laradrop.destroy();
            $('.logoModel').laradrop({
                onInsertCallback: function (src) {
                    if ($('.addImgSettings img').is('#' + src.id)) {
                        alert('Такая картинка уже добавлена!');
                    } else {
                        $('.logo').html('<img  class="logoSite added" id=' + src.id + ' src=' + src.src + '>');
                        var logo = src.src.slice(src.src.indexOf('b_') + 2);
                        $('#logoModel').modal('toggle');
                    }
                }
            });
            });
            $('.saveAjax').on("click",function (){
                var img = $('.settingsImg').attr('src');
                var logo = $('.logoSite').attr('src');               
                console.log(logo);
                $.ajax({
                    url: '/admin/settings/saveHeaher',
                    method: 'post',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        'img': img,
                        'logo':logo
                    }
                }).done(function (data){
                    (data == 200) ? alert("Настройки сохранены") : alert("Ошибка!!!");
                    
                })
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