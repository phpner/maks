<div class="alert alert-info text-center">
    Шапка 1200px х 350px. Ширина растянется до 100%, высота фиксированная 350px <br>
    Лого 300px х 150px. 
</div>
<div class="addImgSettings">
    @if(isset($settings))
        @foreach($settings as $setting)
            <div class="header">
             <img id="headerImg" class="settingsImg" src="{{$setting->header}}" alt="">
            </div>
        <div class="logo">
            <img class="logoSite" src="{{$setting->logo}}" alt="">
        </div>
        @endforeach
    @endif

</div>

<div class="col-md-12 text-center edit-btn">
    <button type="button" class="btn btn-primary btn-lg imdClick" data-toggle="modal" data-target="#imdChanch">
        редактировать шапку
    </button>
    <button type="button" class="btn btn-primary btn-lg logoClick" data-toggle="modal" data-target="#logoModel">
        редактировать лого
    </button>
    <button type="button" class="btn btn-success btn-lg saveAjax">
        Сохранить
    </button>
</div>
<div class="clearfix"></div>
<hr>

<div class="col-md-4 col-md-offset-4">
   <h2 class="text-center">Инфо</h2>
   <form action="settings/saveinfosite" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="tel">телефон</label>
       <input class="form-control" name="tel" type="text" value="{{$settings[0]->tel}}">
       </div>
       <div class="form-group">
       <label for="email">Email</label>
       <input class="form-control" name="email" type="text" value="{{$settings[0]->email}}">
       </div>
       <div class="form-group">
       <label for="mode">Режим</label>
       <input class="form-control" name="mode" type="text" value="{{$settings[0]->mode}}">
       </div>
        <div class="form-group">
        <label for="textunder">Текст под шапкой</label>
       <textarea name="textunder" id="" cols="58" rows="3">{{$settings[0]->textunder}}</textarea>   
       </div>
       <label  for="pricelist">Прайс лист<br><span style="padding: 2px;" class="label-info">
       {{$settings[0]->pricelist}}
        </span>
       </label>
       <input type="file" name="pricelist" value="загрузить прайс лист">
       {{ csrf_field() }}
       <div class="form-group">
       <input class="btn btn-success pull-right" type="submit" value="Сохранить инфо">
       </div>
      
   </form>
</div>
<div class="modal fade" id="imdChanch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Загрузка шапки</h4>
            </div>
            <div class="modal-body">
                <div class="imdChanch" laradrop-csrf-token="l6Y6hKeth7UzQDdGtKzScKzQGl22rO4Pw7Izf8"></div>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="logoModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Загрузка лого</h4>
            </div>
            <div class="modal-body">
                <div class="logoModel" laradrop-csrf-token="l6Y6hKeth7UzQDdGtKzScKzQGl22rO4Pw7Izf7"></div>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>

