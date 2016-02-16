@extends('luchiki48ru/header')

@section('content')



    <section data-stellar-background-ratio="0.3" class="sub-page-banner sub-page-banner-med text-center">
        <div class="overlay"></div>
        <div class="container">
            <h1 class="entry-title">Вопросы и ответы</h1>
            <p>Задайте любой интересующий вас вопрос и наш специалист найдёт ответ</p>
        </div>
    </section>



    <div class="sub-page-content">



        <div class="container padding-top-35">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="light bordered">Напиши и узнаешь</h2>

                    <div class="appointment-form clearfix">
                        <form action="/questanswer" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="ФИО" required name="fio">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" required placeholder="Телефон">
                            </div>
                            <div class="form-group">
                                <textarea name="questions" class="form-control" placeholder="Ваш вопрос"></textarea>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-primary" value="Отправить">
                        </form>
                    </div>




                </div>
                <div class="col-md-6">
                    <h2 class="light bordered">Уверенность и  качество</h2>
                    <div class="feature">
                        <i class="pull-left feature-icon fa fa-user-md"></i>
                        <div class="feature-content">
                            <h5><a href="/team">Наши специалисты</a></h5>
                            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining popularised only five Power of centuries.</p>
                            <a href="/team"><dfn>- Перейти</dfn></a>
                        </div>
                    </div>

                    <div class="feature">
                        <i class="pull-left feature-icon fa fa-phone-square"></i>
                        <div class="feature-content">
                            <h5><a href="/feedback">Записаться на приём</a></h5>
                            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining popularised only five Power of centuries.</p>
                            <a href="/feedback"><dfn>-  Перейти</dfn></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container padding-top-35">
            <div class="row">

                @foreach($QuestAnswers as $QA)
                <div class="col-md-12 blog-wrapper clearfix  padding-top-35">

                    <h2 class="light bordered main-title">Вопрос задал : <span class="pull-right">{{$QA->fio}}</span></h2>

                    <div class="col-md-12">
                        <div class="blog-content">
                            <p class="text-justify">{{$QA->questions}}</p>
                            <hr><h4 class="blog-title text-center">Ответ специалиста:</h4><hr>
                            <p class="text-justify">{{$QA->answer}}</p>

                            <small class="pull-right">{{$QA->created_at}}</small>
                        </div>
                    </div>


                </div>
                @endforeach



                    {!! $QuestAnswers->render() !!}

            </div>
        </div>





    </div>


@endsection
