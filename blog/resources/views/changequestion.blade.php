@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Изменить вопрос</div>

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
                        <form method="POST" action="{{action('QuestionsController@updateQuestion')}}"/>
                        <label for="category">Выберите категорию</label><select name="category">
                        @foreach($categories as $cat)
                                <option value="{{$cat->id}}"
                                @if($cat->id == $question->category_id)
                                    selected="selected"
                                @endif
                                >{{$cat->category}}</option>
                        @endforeach
                        </select><br>
                            <label for="text">Вопрос:</label>
                            <textarea name="text">{{$question->text}}</textarea><br>
                            <label for="text">Автор:</label>
                            <input type="text" name="name" value="{{$question->name}}" /><br>
                        <label for="answer">Ответ:</label>
                        <textarea name="answer">{{$question->answer}}</textarea><br>
                        <label for="status">Статус</label><select name="status">
                        @foreach($status as $stat)
                            <option value="{{$stat->id}}"
                                    @if($stat->id == $question->status)
                                    selected="selected"
                                    @endif
                            >{{$stat->status}}</option>
                            @endforeach
                            </select>
                        <input type="hidden" name="id" value="{{$question->id}}"><br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="submit" value="Сохранить">
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
