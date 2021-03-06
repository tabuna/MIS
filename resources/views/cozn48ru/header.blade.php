<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <link href="/cozn48.ru/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="qHmgM8pVN7GCedYiVBz_m49VWBZHE0-PHURQfidrlGg" />
    <meta name='yandex-verification' content='5a5c49062c6e110e' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/cozn48.ru/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/cozn48.ru/style.css">
    @if(is_null($meta = SEO::render()) || empty($meta = SEO::render()))
        <title>@yield('title') - Центр остеопатии</title>
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
    <script type="text/javascript" src="/cozn48.ru/js/jquery.js"></script>
    <script type="text/javascript" src="/cozn48.ru/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/cozn48.ru/js/slick/slick.css"/>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script type="text/javascript" src="/cozn48.ru/js/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.fbtn').click(function(){
                if($(this).parent().next().length != 0){
                    $(this).parent().hide().next().show();
                }
            });

            $('.app-header .circle').click(function(){
                var data = $(this).attr('data-target');
                $('.appointment-form form>div').hide();
                $('.'+data+'').show();
            });


        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-65069943-27', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>


<div class="header">
    <div class="shapka container">
        <div class="logo col-md-3 col-sm-12 col-xs-12">
            <a href="/">
            <img src="/cozn48.ru/img/logo.png" alt="«Центр остеопатии»">
            </a>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="adress col-sm-4">
                <img src="/cozn48.ru/img/adress.png" alt="Адрес"> Липецк, ул. Фрунзе 14
            </div>
            <div class="socialnetwork col-sm-2 col-xs-12">
                <!--
                <a href="http://vk.com" target="_blank">
                    <img src="/cozn48.ru/img/vk.png">
                </a>
                <a href="http://ok.ru"  target="_blank">
                    <img src="/cozn48.ru/img/ok.png">
                </a>
                <a href="http://facebook.com"  target="_blank">
                    <img src="/cozn48.ru/img/fb.png">
                </a>
                -->
            </div>
            <div class="phone col-sm-3 col-xs-12">
                <img src="/cozn48.ru/img/phone.png" alt="Телефон"> (4742) <span class="tel">227-887</span>
            </div>
            <div class="callback col-sm-3 col-xs-12">
                <a type="button" class="btn btn-lg button1" data-toggle="modal" data-target="#myModal">
                    обратный звонок
                </a>




                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Обратный звонок</h4>
                            </div>
                            <form action="/feedback" method="post">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>ФИО</label>
                                    <input type="text" required name="fio" class="form-control" placeholder="ФИО" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" placeholder="Email" >
                                </div>
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="text" required name="phone" class="form-control" placeholder="Телефон" >
                                </div>
                                <div class="form-group">
                                    <label>Сообщение</label>
                                    <textarea name="message" required class="form-control" placeholder="Ваше сообщение"></textarea>
                                </div>
                                {{csrf_field()}}

                            </div>
                            <div class="modal-footer">
                                <button  type="submit" class="btn button1">Отправить</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    @if(Session::has('good'))
        <div class="alert alert-success">
            {{ Session::get('good') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="container alert-container">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Ошибка!</strong> Пожалуйста проверте вводимые данные.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="buttons">
        <nav class="navbar navbar-default container">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        {!! Menu::getLi(6,'top','') !!}
                    </ul>
                    <form class="navbar-form navbar-form-sm pull-right nav-search"  role="search" action="/search" method="post">
                        {!! csrf_field() !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" required  placeholder="Поиск по ...">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                              </span>
                        </div>
                    </form>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>
@yield('content')
@include('cozn48ru/footer')
