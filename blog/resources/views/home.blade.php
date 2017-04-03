@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Админка view Home</div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h2>Списки вопросов:</h2>

                        ---><a href="/questions/list">Открыть список вопросов</a><br>
                        ---><a href="/questions/noanswerlist">Открыть список вопросов без ответов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Список администраторов</h2>
                        <?php
                        echo "Текуший пользователь: " . \Auth::user()->id;
                        ?>
                        <table border="1">
                            <tr>
                                <th>ID</th>
                                <th>Пользователь</th>
                                <th>E-mail</th>
                                <th>Удаление</th>
                            </tr>
                            @foreach($users as $usr)
                                <tr>
                                    <td><a href="/users/change/{{$usr->id}}" title="Изменить">{{$usr->id}} </a></td>
                                    <td> {{$usr->name}} </td>
                                    <td>{{$usr->email}}</td>
                                    <td><a href="/users/delete/{{$usr->id}}">Удалить</a></td>
                                </tr>
                            @endforeach
                        </table>
                        {{--<a href="/users/create">Создать пользователя</a>--}}
                        <div class="cd-faq-form">
                            <h2>Добавить пользователя:</h2>
                            <form method="POST" action="{{action('UsersController@store')}}">
                                <div class="block"><label for="login">Имя пользователя:</label>
                                    <input type="text" name="login" required/><br></div>
                                <div class="block"><label for="email">E-mail:</label>
                                    <input type="text" name="email" required/><br></div>
                                <div class="block"><label for="password">Пароль:</label>
                                    <input type="password" name="password" required/><br></div>
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="submit" value="Сохранить">
                            </form>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h2>Категории</h2>

                        <table border="1">
                            <tr>
                                <th>ID</th>
                                <th>Категория</th>
                                <th>Удаление</th>
                                <th>Всего вопросов</th>
                                <th>Опубликовано</th>
                                <th>Без ответов</th>
                            </tr>
                            @foreach($categories as $cat)
                                <tr>
                                    <td><a href="category/edit/{{$cat->id}}" title="Изменить">{{$cat->id}} </a></td>
                                    <td> {{$cat->category}} </td>
                                    <td><a href="category/delete/{{$cat->id}}">Удалить</a></td>
                                    <td>{{$stats[$cat->id]['all']}}</td>
                                    <td>{{$stats[$cat->id]['published']}}</td>
                                    <td>{{$stats[$cat->id]['noanswer']}}</td>
                                </tr>
                            @endforeach
                        </table>

                        <form method="POST" action="{{action('CategoriesController@store')}}">
                            <h2>Добавить категорию:</h2>
                            <input type="text" name="title"/><br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="submit" value="Сохранить">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
