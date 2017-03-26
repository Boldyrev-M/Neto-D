@extends('layouts.app')
<?php
$users = DB::table('users')->get();
?>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Админка view Home </div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<h1>Админка</h1>
<h2>Администраторы</h2>
<ul>
    <li><a href="/adminka/users">Список пользователей</a></li>
    {{--<li><a href="/adminzone/articles/create">Добавить статью</a></li>--}}
    <table border="1">
        <tr><th>NN </th>
            <th>User name</th>
            <th>E-mail</th></tr>
    @foreach($users as $usr)

            <td><a href="#{{$usr->id}}" title="Изменить">{{$usr->id}} </a></td>
                <td> {{$usr->name}} </td><td>{{$usr->email}}</td>


<?php //echo "<pre>".print_r($usr,true)."</pre>";
$glue  = "</td><td>";
        //$imp = implode($glue,$usr);
//        echo "<table><tr><td>".$imp."</td></tr></table>"; ?>
    @endforeach
    </table>
</ul>
<h2>Категории</h2>
<ul>
    <li>Все категории</li>
    <li>Добавить категорию</li>
</ul>
<h2>Список вопросов</h2>
<ul>
    <li><a href="/adminka/qlist">Список вопросов</a></li>
    <ul>
        <h2>Страницы</h2>
        <ul>

@endsection
