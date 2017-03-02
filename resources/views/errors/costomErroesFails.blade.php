@if(isset($messages))
    {{$messages->messages()->first('email') }} <br>
    {{$messages->messages()->first('password')}}
@endif