<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="faq/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="faq/css/style.css"> <!-- Resource style -->
    <script src="faq/js/modernizr.js"></script> <!-- Modernizr -->
    <title>Вопросы и ответы :: Neto-D</title>
</head>
<body>
<header>
    <h1>Вопросы и <a href="/home">ответы</a> :: Neto-D <!-- :: <a href="#ask">Задать вопрос</a>--></h1>

</header>

<section class="cd-faq">

    <ul class="cd-faq-categories">
        @foreach($categoriesNotEmpty as $cat)

            <li><a href="#{{$cat->id}}">{{$cat->category}}</a></li>

        @endforeach
    </ul> <!-- cd-faq-categories -->

    <div class="cd-faq-items">
        @foreach($categoriesNotEmpty as $cat)
            <ul id="{{$cat->id}}" class="cd-faq-group">
                <li class="cd-faq-title"><h2>{{$cat->category}}</h2></li>
                @foreach($faq as $faqId)
                    @if ($faqId->category_id == $cat->id)
                        <li>
                            <a class="cd-faq-trigger" href="#0">{{$faqId->text}}</a>
                            <div class="cd-faq-content">
                                <p>{{$faqId->answer}}</p>
                            </div> <!-- cd-faq-content -->
                        </li>
                    @endif
                @endforeach
            </ul> <!-- cd-faq-group -->
        @endforeach
    </div> <!-- cd-faq-items -->
    <a href="#0" class="cd-close-panel">Close</a>

    <div class="cd-faq-form"> <a name="#ask"><h1>Задать вопрос:</h1></a>
    {{----}}
        <form name="Newquestion" action="{{action('QAController@addQuestion')}}" method="POST">
            <div class="block"><label>Ваше имя:</label><input type="text" name="name" required></div>
            <div class="block"><label>Введите e-mail:</label><input type="text" name="email" required></div>
            <div class="block"><label>Выберите категорию вопроса</label><select name="category" required>
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                    @endforeach
                </select></div>
            <div class="block"><label>Текст вопроса:</label><textarea name="text" maxlength="100" autofocus required></textarea></div>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="block"><input type="submit" value="Отправить"></div></form>
    {{----}}
    </div>
</section> <!-- cd-faq -->

@yield('question form')

<script src="faq/js/jquery-2.1.1.js"></script>
<script src="faq/js/jquery.mobile.custom.min.js"></script>
<script src="faq/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>