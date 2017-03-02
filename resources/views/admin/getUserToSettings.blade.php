<div class="jsonUsers">
    <table>
        <thead>
        <tr>
        <th>Имя</th>
        <th>Email</th>
        <th>Пароль</th>
        <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            <tr>
                <td>{{ $user->name }}</td>  <td> {{ $user->email}} </td>  <td> ********* </td>
                <td>
                    <a href="#"><span class="glyphicon glyphicon-pencil edit"></span></a>
                <a href=""><span class="glyphicon glyphicon-remove "></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
<div class="col-md-12 text-center">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reg">
        Добавить
    </button>
</div>

<div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Загрузка файлов</h4>
            </div>
            <div class="modal-body">

                @include('admin.regFromSettings')

            </div>
        </div>
    </div>
</div>