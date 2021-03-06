@extends('sokzn48ru.app')


@section('content')



    <section class="well page-bg well-lg blog-bg text-white m-b-none">
        <div class="container text-center text-middle">
            <div class="lead">
                <h2>
                    Как добраться
                </h2>
            </div>
        </div>
    </section>



    <section class="container">


        <div class="wrapper-md">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-post">
                        <div class="panel">

                            <div class="wrapper-lg">
                                <div class="row">
                                    <div class="col-md-8 col-xs-12">
                                        <div class="map well m-t bg-light lt">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2423.2438515896024!2d39.592403!3d52.601363!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x413a14e9eece3c35%3A0xdfbc4fe617d626e0!2z0J7QutGC0Y_QsdGA0YzRgdC60LDRjyDRg9C7LiwgNjEsINCb0LjQv9C10YbQuiwg0JvQuNC_0LXRhtC60LDRjyDQvtCx0LsuLCAzOTgwNTk!5e0!3m2!1sru!2sru!4v1432638437060"
                                                    height="450" frameborder="0" style="border:0; width: 100%"></iframe>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xs-12 text-center">
                                        <h2 class="light bordered">Написать нам сообщение</h2>

                                        <div class="row">
                                            @if(Session::has('good'))
                                                <div class="alert alert-success">
                                                    {{ Session::get('good') }}
                                                </div>
                                            @endif
                                        </div>
                                        <form action="/feedback" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fio" placeholder="ФИО"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                       placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Телефон" required>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" rows="4" required
                                                          placeholder="Текст сообщения"></textarea>
                                            </div>
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-info" value="Отправить">
                                        </form>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>


    </section>


@endsection
