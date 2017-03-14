<footer>
    <nav class="row menu footer">
       <div class="col-md-4"><span id="email"><img src="/img/email.png" alt=""> {{$setting[0]->email}}</span></div>
            <span id="phone">
                <div class="col-md-4"><img src="/img/phone-call.png" alt=""> {{$setting[0]->tel}}</div>
                <div class="col-md-4"> <img src="/img/clock.png" alt=""> {{$setting[0]->mode}}</div>
            </span>
        <div class="row power">
            power by <a href="http://phpner.in.ua">phpner</a>
        </div>
        @if(Auth::check())
            <div class="enter"><a href="/admin">Вы вошли как {{Auth::user()->name}} . Перейти в админ панель</a></div>
            @else
        <div class="enter"><a href="/login">Вход .</a></div>

        @endif
    </nav>
</footer>