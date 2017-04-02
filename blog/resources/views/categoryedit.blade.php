@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Изменить категорию</div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="{{action('CategoriesController@updateCatName')}}"/>
                        {{--
                        {{action('CategoriesController@updateCat')}}
                        --}}

                            Текущее название: {{$name}}<br>
                        <label>Новое название:</label>
                        <input type="text" name="newname" required autofocus/><br>
                        <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="submit" value="Сохранить">

                    </div>
                </div>
            </div>
        </div>

@endsection
