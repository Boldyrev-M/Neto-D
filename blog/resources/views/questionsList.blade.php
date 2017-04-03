@extends('layouts.app')

{{--
DONE Просматривать вопросы в каждой теме. По каждому вопросу видно дату создания, статус (ожидает ответа / опубликован / скрыт).
Удалять любой вопрос из темы.
Скрывать опубликованные вопросы.
Публиковать скрытые вопросы.
Редактировать автора, текст вопроса и текст ответа.
Перемещать вопрос из одной темы в другую.
Добавлять ответ на вопрос с публикацией на сайте, либо со скрытием вопроса.
Видеть список всех вопросов без ответа во всех темах в порядке их добавления. И иметь возможность их редактировать и удалять
--}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список вопросов</div>
                    <a href="/home">---> Открыть список админов и категорий</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>{{$title}}</h2>

                        @foreach($categories as $cat)

                                   <h3> {{$cat->id}}) {{$cat->category}} </h3>

                                    <table border="1">
                                        <tr>
                                            <th>ID</th>
                                            <th>Текст вопроса</th>
                                            <th>Кто добавил</th>
                                            <th>Когда добавил</th>
                                            <th>E-mail:</th>
                                            <th>Статус</th>
                                            <th>Ответ</th>
                                            <th>Показать</th>
                                        </tr>
                                        @foreach($questions as $vopr)
                                            @if ( ($vopr->category_id) ==  $cat->id )
                                                <tr>
                                                    <td><a href="change/{{$vopr->id}}"
                                                           title="Изменить">{{$vopr->id}} </a>
                                                    </td>
                                                    <td> {{$vopr->text}} </td>
                                                    <td> {{$vopr->name}} </td>
                                                    <td> {{$vopr->created_at}} </td>
                                                    <td> {{$vopr->email}} </td>
                                                    @foreach($stat as $currentstat)
                                                        @if ($vopr->status == $currentstat->id)
                                                            <th>{{$currentstat->status}}</th>
                                                        @endif
                                                    @endforeach
                                                    <th>{{$vopr->answer}}</th>

                                                    <td><a href="question/delete/{{$vopr->id}}">Удалить</a></td>
                                                </tr>
                                            @endif {{--только вопросы для этой категории--}}
                                        @endforeach {{--список вопросов по категории--}}
                                    </table>
                                    <td><a href="/category/delete/{{$cat->id}}">Удалить</a></td>
                                </tr>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
