<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="faq/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="faq/css/style.css"> <!-- Resource style -->
    <script src="faq/js/modernizr.js"></script> <!-- Modernizr -->
    <title>FAQ</title>
</head>
<body>
<header>
    <h1>FAQ</h1>
</header>
<section class="cd-faq">
    <ul class="cd-faq-categories">
        @foreach($categories as $cat)

            <li><a href="#{{$cat->id}}">{{$cat->category}}</a></li>
        @endforeach
    </ul> <!-- cd-faq-categories -->

    <div class="cd-faq-items">
        @foreach($categories as $cat)
            <ul id="{{$cat->id}}" class="cd-faq-group">
                <li class="cd-faq-title"><h2>{{$cat->category}}</h2></li>
                @foreach($faq as $faqId)
                    @if ($faqId->category == $cat->id)
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
</section> <!-- cd-faq -->

@yield('question form')

<script src="faq/js/jquery-2.1.1.js"></script>
<script src="faq/js/jquery.mobile.custom.min.js"></script>
<script src="faq/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>