@extends('admin.admin')
@section('content')
    <form class="form" method="post" action="/admin/add_items">
        {{csrf_field()}}
        <div class="container">
            <div class="form-group text-center clearfix">
                <div class="col-md-6 col-md-offset-3">
                    <label for="title">Название товара</label>
                    <input type="text" name="title" placeholder="Название товара" class="form-control">

                    @if($errors->has('title'))
                        <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            {{$errors->first('title')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group text-center clearfix">
                <div class="col-md-8 col-md-offset-2">
                    <label for="description">Описание продукта</label>
                    <textarea name="description" class="form-control" id="textarea" placeholder="Описание" cols="12"
                              rows="5">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <fieldset class="col-md-2 col-md-push-8">
                    <b>Категория</b>
                    <select class="celect-cat" name="category_id" id="">
                        <option value="1">Пакет майка</option>
                        <option value="2">Фасовочные пакеты</option>
                        <option value="3">Мусорные пакеты</option>
                    </select>
                </fieldset>
            </div>
            <div class="form-group text-center clearfix">
                <div class="col-md-2 col-md-offset-8">
                    <label for="title">Цена</label>
                    <div class="input-group">
                        <input type="text" name="price" placeholder="цена" class="form-control">
                        <span class="input-group-addon"></span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="addImg container text-center"></div>

        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Добавить картинку /редактировать
            </button>
        </div>
        <br>
        <hr>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success">
                Сохранить
            </button>
            <a href="{{route('admin')}}" class="btn btn-danger" > Отмена</a>

        </div>

        <div class="addfile"></div>
    </form>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
@endsection
@section('script')
    <script>
        $(function () {
                $(".form").validate({
                    rules: {
                        title: {
                            required: true
                        },
                        category: {
                            required: true
                        }
                    },
                    messages: {
                        title: {
                            required: 'Название товара обязательно!'
                        },
                        category: {
                            required: "Выберите категорию!"
                        }
                    },
                    errorClass: 'alert-danger',

                });

            $('.laradrop').laradrop({

                onInsertCallback: function (src) {

                    if ($('.addImg img').is('#' + src.id)) {
                        alert('Такая картинка уже добавлена!');
                    } else {
                        $('.addImg').html('<div class="imgIn thumbnail"> <span class="glyphicon glyphicon-remove-sign delImg"></span> <img  id=' + src.id + '  class="added" src=' + src.src + '></div>');

                        var img = src.src.slice(src.src.indexOf('b_') + 2);

                        $('.addfile').html('<input type="hidden" name="file" value=' + img + '>');
                        $('#myModal').modal('toggle');
                    }

                    $('.delImg').on('click', function () {

                        $(this).parent('div').remove();
                        $("input[name='file']").remove();
                    });
                },

                onErrorCallback: function (jqXHR, textStatus, errorThrown) {
                    alert('An error occured: ' + errorThrown);
                },

                onSuccessCallback: function (serverData) {
                    // if you need a success status indicator, implement here
                }
            });


        });
    </script>
@endsection
