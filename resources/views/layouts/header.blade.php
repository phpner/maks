<div class="container-fluid">
    <div class="row header">
        <img class="header-bg" src="{{$setting[0]->header}}" alt="">
        <img  class="flower-top" src="/img/flower-top.png" alt="">
        <img class="flower-bottom" src="/img/flower-bottom.png" alt="">
        <nav class="row menu">
            <span id="email"><img src="/img/email.png" alt=""> {{$setting[0]->email}}</span>
            <span id="phone"><img src="/img/phone-call.png" alt=""> {{$setting[0]->tel}}<span class="hidden-xs">
                    <img src="/img/clock.png" alt=""> {{$setting[0]->mode}}
                </span>
            </span>
        </nav>
        <div class="row">
            <p class="header-text">
                <img id="logo" src="{{$setting[0]->logo}}" alt="">
            </p>
        </div>
        <button>
            <a href="/priceList/{{$setting[0]->pricelist}}">
            <span id="s">Скачать</span> 
            <span id="p">прайс лист</span></a>
        </button>
    </div>
    <div class="row text-bottom text-center">{{$setting[0]->textunder}}</div>
</div>