<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/zdorovie48/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/zdorovie48/css/orchid.css" type="text/css">
    <script src="/zdorovie48/js/orchid.js"></script>
    <meta name="google-site-verification" content="aDS7vvzuwnzLcrgCUvsYDzzWzLvDCdAP40JfSbiiPyo" />
    <meta name="yandex-verification" content="04fc130ecf2406f2" />

    @if(is_null($meta = SEO::render()) || empty($meta = SEO::render()))
        <title>@yield('title') - Медицинский центр «Здоровье Нации»</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:image" content="@yield('avatar')">
        <meta name="twitter:title" content="@yield('title')">
        <meta name="twitter:description" content="@yield('description')"/>
        <meta name="twitter:image:src" content="@yield('avatar')"/>
    @else
        {!! $meta !!}
    @endif

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-65069943-26', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>


@if (count($errors) > 0)
    <script>
        swal({
            title: "Ошибка!",
            text: "<ul class='w-xxl block-center'>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>",
            html: true,
            type: "warning",
        });
    </script>
@endif




@if (Session::has('good'))
    <script>
        swal("Успех!", "{{Session::get('good')}}", "success")
    </script>
@elseif(Session::has('bad'))
    <script>
        swal("Ошибка!", " {{Session::get('bad')}}", "warning")
    </script>
@endif



<style>


</style>

<script>

</script>




<header>

    <nav class="navbar navbar-top  container-fluid">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed text-black" data-toggle="collapse"
                            data-target="#navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Навигация</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="/">
                        <img src="/zdorovie48/img/logo.png" alt="Здоровье Нации" class="img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    {!!Menu::getZdorovieNacii('2','Верхнее меню','','menu')!!}

                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container-fluid -->
    </nav>


    <section class="container header-bottom">
        <div class="row">
            <div class="col-md-4 v-center">
                <div class="col-md-2 padder-v">
                    <i class="fa fa-home fa-3x text-success"></i>
                </div>
                <div class="col-md-10 padder-v">
                    <div class="h5 m-b-sm m-t-sm"><b>Свяжитесь с нами +7 (4742) 227-887</b></div>
                    <small>ул. Октябрьская д.61</small>
                </div>
            </div>


            <div class="col-md-4 v-center">
                <div class="col-md-2 padder-v">
                    <i class="fa fa-clock-o fa-3x text-success"></i>
                </div>
                <div class="col-md-10 padder-v">
                    <div class="h5 m-b-sm m-t-sm"><b>График работы</b></div>
                    <small>Пн - Пт: 8:00 - 21:00, Сб: 8:00 - 18:00<br>
                        По предварительной записи
                    </small>
                </div>
            </div>

            <a class="feedback_link" href="/#main-appointments-section">
            <div class="col-md-4 bg-success text-white v-center">

                <div class="col-md-2 padder-v">
                    <i class="fa fa-calendar fa-3x"></i>
                </div>
                <div class="col-md-10 padder-v">
                    <div class="h5 m-b-sm m-t-sm"><b>Запишитесь на приём</b></div>
                    <small>В три простых шага</small>
                    <br>
                    <span>&nbsp;</span>

                </div>


            </div>
            </a>
        </div>
    </section>


</header>


@yield('content')


@include('newzdorovie48ru/footer')
