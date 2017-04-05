@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Изменить данные пользователя</div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="block">
                        <form method="POST" action="{{action('UsersController@update')}}"/>
                        <label for="login">Логин:</label>
                        <input type="text" name="login" value="{{$data->name}}" /><br>
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{$data->email}}" /><br>
                        <label for="password">Новый пароль (если нужно изменить)</label>
                            <input type="password" name="password" />
                        <input type="hidden" name="id" value="{{$data->id}}"><br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="submit" value="Сохранить">
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
