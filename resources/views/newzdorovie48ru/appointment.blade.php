@extends('newzdorovie48ru/header')

@section('content')

    <section class="appointment-sec text-center">
        <div class="container">
            <h1>Записаться на приём к специалисту</h1>

            <p class="lead">Быстрая и удобная запись в врачу где бы вы не были</p>
            <div class="row">
            <div class="col-md-6">
            	<figure><img src="/site1.ru/images/appointment-img.jpg" alt="image" title="Appointment image" class="img-responsive lady1"></figure>
            </div>
            <div class="col-md-6">


                <div class="appointment-form clearfix">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>

                                <p>Шаг 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle"
                                   disabled="disabled">2</a>

                                <p>Шаг 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle"
                                   disabled="disabled">3</a>

                                <p>Шаг 3</p>
                            </div>
                        </div>
                    </div>
                    <form role="form" action="appointment/store" method="post">
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <div class="h5 m-t m-b"> Выберите специализацию</div>

                                    <div class="form-group row">
                                        <label class="control-label">Специализациия</label>
                                        <select name="specialization" required>
                                            <option selected disabled>Выберите специализацию</option>
                                            @foreach($specialization as $spec)
                                                <option value="{{$spec->specialization}}">{{$spec->specialization}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group row">
                                        <label class="control-label">Врач</label>
                                        <select disabled name="name" required>
                                            <option>Выберите врача</option>
                                        </select>
                                    </div>


                                    <div class="form-group row">
                                        <label class="control-label">Место</label>
                                        <select disabled name="subdivision" required>
                                            <option>Выберите место</option>
                                        </select>
                                    </div>






                                    <script>
                                        $('select[name="subdivision"]').change(function () {

                                            var Placevalue =  $('select[name="subdivision"] :selected').val();
                                            var NameValue = $('select[name="name"] :selected').val();
                                            var Specialvalue = $('select[name="specialization"] :selected').val();
                                            var csrf = $('meta[name="csrf-token"]').attr('content');


                                            $.ajax({
                                                type: "POST",
                                                url: "/appointment/time/" + Placevalue +"/"+ Specialvalue +"/"+ NameValue ,
                                                dataType: 'json',
                                                beforeSend: function(request) {
                                                    request.setRequestHeader('X-CSRF-Token', csrf);
                                                },
                                                success: function(msg){
                                                    var option = "";

                                                    $.each(msg, function(dateStr,timeObj) {
                                                        option += "<h5>"+dateStr+"</h5>";

                                                        $.each(timeObj, function(dateStr2,timeObj2) {


                                                            option += "<div class='radio'><label><input type='radio' required name='apport' value='" + this.beginning + "|" + this.end + "'> С " + this.Shours + ":" + this.Sminute + " по " + this.Ehours + ":" + this.Eminute + "</label></div>";

                                                        });

                                                    });


                                                    if(!option){
                                                        option += "<h2>К данному специалисту нет свободной записи</h2>";
                                                    }


                                                    $('#date').html(option);


                                                },
                                                error: function()
                                                {
                                                    console.log('ошибка');
                                                }/*,
                                                 complete: function()
                                                 {
                                                 console.log('завершён');
                                                 }*/
                                            });



                                            return false;
                                        });




                                        $('select[name="specialization"]').change(function () {


                                            var obj = $(this);
                                            var Curvalue = $(':selected',this).val();
                                            //var Placevalue = $('select[name="subdivision"] :selected').val();
                                            var csrf = $('meta[name="csrf-token"]').attr('content');


                                            $.ajax({
                                                type: "POST",
                                                url: "/appointment/fio/" + Curvalue ,
                                                beforeSend: function(request) {
                                                    request.setRequestHeader('X-CSRF-Token', csrf);
                                                },
                                                success: function(msg){

                                                    var option = "<option selected disabled>Выберите врача</option>";
                                                    for(var i = 0; msg.length > i; i++)
                                                    {
                                                        option += "<option value='"+ msg[i].name + "'>"
                                                                + msg[i].name + "</option>";
                                                    }

                                                    $('select[name="name"]').html(option);
                                                    $('select[name="name"]').attr('disabled', false);

                                                }
                                            });


                                        });



                                        $('select[name="name"]').change(function () {
                                            var Curvalue = $(':selected',this).val();

                                            var NameValue = $('select[name="name"] :selected').val();
                                            var SpecialValue = $('select[name="specialization"] :selected').val();
                                            var csrf = $('meta[name="csrf-token"]').attr('content');


                                            $.ajax({
                                                type: "POST",
                                                url: "/appointment/place/" + SpecialValue + "/" + NameValue ,
                                                beforeSend: function(request) {
                                                    request.setRequestHeader('X-CSRF-Token', csrf);
                                                },
                                                success: function(msg){


                                                    var option = "<option selected disabled>Выберите место</option>";
                                                    for(var i = 0; msg.length > i; i++)
                                                    {

                                                        option += "<option value='"+ msg[i].subdivision + "'>"
                                                                + msg[i].subdivision + "</option>";
                                                    }

                                                    $('select[name="subdivision"]').html(option);
                                                    $('select[name="subdivision"]').attr('disabled', false);

                                                }
                                            });



                                        });

                                    </script>






                                    <button class="btn btn-default  nextBtn btn-rounded pull-right" type="button">
                                        Далее
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <div class="h5 m-t m-b"> Выберите дату</div>

                                    <div class="form-group appointment-scroll" id="date">

                                  </div>

                                    <button class="btn btn-default nextBtn btn-rounded pull-right" type="button">Далее
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <div class="h5 m-t m-b"> Информация</div>

                                    <input type="text" name="firstname" max="255"  required placeholder="Имя">
                                    <input type="text" name="lastname" max="255" required placeholder="Фамилия">
                                    <input type="email" name="email" placeholder="Email адрес">
                                    <input name="phone" required placeholder="Номер телефона" type="text" data-mask="+ 9-999-999-99-99">
                                    <textarea rows="4" name="comment" placeholder="Комментарий"></textarea>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-default btn-rounded pull-right" type="submit">Записаться!
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </div>
    </section>




    <section class="after-booking-sec text-center">
        <div class="container">
            <div class="h1 m-t m-b">Что дальше?</div>


            <ul class="medicom-feature-list list-inline text-left">
                <li><i class="fa fa-check medicom-check"></i>Вы можете записаться на прием к любому врачу/специалисту нашего центра. Познакомиться с нашими врачами можно в разделе специалисты.</li>
                <li><i class="fa fa-check medicom-check medicom-check-red"></i>Ваша запись является предварительной, с Вами свяжется сотрудник нашего центра и согласует окончательную дату приема</li>
                <li><i class="fa fa-check medicom-check"></i>Указанная Вами дата приема может быть изменена в связи с действующим расписанием и существующей записью</li>
                <li><i class="fa fa-check medicom-check"></i>С момента подачи заявки с Вами свяжется сотрудник нашего
                    центра и согласует окончательную дату приема
                </li>
                <li><i class="fa fa-check medicom-check"></i>Для иногородних: просим Вас планировать приезд в  медицинский центр только после подтверждения даты приема.</li>
                <li><i class="fa fa-check medicom-check"></i>Будьте внимательны, указывайте правильный, действующий контактный номер телефона.</li>
                <li><i class="fa fa-check medicom-check"></i>Вы можете указать свой адрес электронной почты для того, чтобы получать информацию о скидках и специальных предложениях  медицинского центра «Здоровье Нации».</li>
                <li><i class="fa fa-check medicom-check"></i>Вы также можете позвонить нам по телефону:
                    <a href="tel:+74742227887">+7 (4742) 227-887</a> и записаться с 8.00 до 21.00 ежедневно.</li>

            </ul>
        </div>
    </section>










    <section class="services-sec container">

        <h2 class="light bordered">Преимущества</h2>
        <div class="service-box one">
            <span class="icon img-circle"><i class="fa fa-lightbulb-o"></i></span>
            <h4><a href="#.">МНОГОПРОФИЛЬНОСТЬ</a></h4>

            <p> «Здоровье нации» – это многопрофильный медицинский центр, ориентированный на оказание высококвалифицированной помощи жителям города и области.
            </p>

        </div>
        <div class="service-box two">
            <span class="icon img-circle"><i class="fa fa fa-flask"></i></span>
            <h4><a href="#.">КВАЛИФИКАЦИЯ СПЕЦИАЛИСТОВ</a></h4>

            <p>Наши врачи с многолетним опытом работы, среди них доктора и кандидаты медицинских наук, врачи с высшей квалификационной категорией, заслуженные врачи Российской федерации.

            </p>
        </div>
        <div class="service-box three">
            <span class="icon img-circle"><i class="fa fa-tint"></i></span>
            <h4><a href="#.">БЕЗОПАСНОСТЬ</a></h4>

            <p>
                В медицинских центрах группы компаний «Здоровье нации» весь инструментарий стерилен, поэтому вы можете не волноваться о безопасности проведения процедур.
            </p>
        </div>
        <div class="service-box four">
            <span class="icon img-circle"><i class="fa fa-phone"></i></span>
            <h4><a href="#.">ЛОЯЛЬНОСТЬ</a></h4>

            <p>Мы гарантируем индивидуальный подход, высокоточную диагностику на современном оборудовании, соблюдение всех норм и правил оказания медицинской помощи.
            </p>
        </div>
    </section>











<!--
    <section class="services-sec container">

        <h2 class="light bordered">Service <span>style 3</span></h2>

        <div style="cursor:pointer;position: relative;"  class="service-box one">
            <a class="modal-starter" data-toggle="modal" data-target="#myModal1"></a>
            <span class="icon img-circle"><i class="fa fa-lightbulb-o"></i></span>
            <h4><a  href="#.">Многопрофильность </a></h4>



            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Многопрофильность</h4>
                        </div>
                        <div class="modal-body">
                            «Здоровье нации» – это многопрофильный медицинский центр, ориентированный на оказание высококвалифицированной помощи жителям города и области.
                            <br><br>
                            «Здоровье нации» - это профессиональная команда специалистов, которые: <br>
                            - ответственно используют проверенные и надежные технологии;<br>
                            - постоянно работают над внедрением инноваций;<br>
                            - добиваются положительных результатов в каждом конкретном случае с каждым конкретным клиентом.

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div style="cursor:pointer;"  class="service-box two">
            <a class="modal-starter" data-toggle="modal" data-target="#myModal2"></a>
            <span class="icon img-circle"><i class="fa fa fa-flask"></i></span>
            <h4><a  href="#.">Квалификация специалистов</a></h4>


            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Квалификация специалистов</h4>
                        </div>
                        <div class="modal-body">
                            Врачи,  принимающие в нашем центре, с многолетним опытом работы, среди них доктора и кандидаты медицинских наук, врачи с высшей квалификационной категорией, заслуженные врачи Российской федерации. Вы можете записаться к ним на прием в удобное для Вас время.<br><br>
                            В медицинском центре «Здоровье Нации» собственная лаборатория, а как известно анализы  являются главной частью в диагностики заболеваний человека. Наша лаборатория оснащена современным оборудованием, которое соответствует всем требованиям федеральных и международных стандартов качества.<br><br>
                            Мы гарантируем оперативность, надежность, высокий профессионализм медицинского персонала лаборатории.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div style="cursor:pointer;"  class="service-box three">
            <a class="modal-starter" data-toggle="modal" data-target="#myModal3"></a>
            <span class="icon img-circle"><i class="fa fa-tint"></i></span>
            <h4><a href="#.">Безопасность</a></h4>


            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Безопасность</h4>
                        </div>
                        <div class="modal-body">
                            В медицинских центрах группы компаний «Здоровье нации» весь инструментарий стерилен, поэтому вы можете не волноваться о безопасности проведения процедур. Безопасность – этот принцип основывается на индивидуальности, одноразовости, стерильности.<br><br>
                            Одноразовый инструментарий: шприцы, иглы, одноразовые системы для внутривенного вливания, иглы - бабочки для забора крови, скарификатор, быстр в подготовке, не требует циклической стерилизации, минимизирует эпидемиологическую угрозу.<br><br>
                            Все используемые многоразовые инструменты проходят четыре  стадии  очистки:<br><br>
                            1.дезинфекцию<br>
                            2.ПСО (предстерилизационная очистка)<br>
                            3.стерилизация (в автоклавирующем  оборудовании Vacuclav 24B Германии)<br>
                            4.ополаскивание дистиллированной водой<br>
                            В нашей клинике используется упаковочный материал в рулонах для паровой стерилизации марки Steriguard  и упаковочный аппарат Legron, позволяющий в течение года  сохранять стерильность инструментария.<br>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div style="cursor:pointer;"  class="service-box four">
            <a class="modal-starter" data-toggle="modal" data-target="#myModal4"></a>
            <span class="icon img-circle"><i class="fa fa-phone"></i></span>
            <h4><a href="#.">Лояльность </a></h4>


            <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Лояльность</h4>
                        </div>
                        <div class="modal-body">
                            Мы гарантируем индивидуальный подход, высокоточную диагностику на современном оборудовании, соблюдение всех норм и правил оказания медицинской помощи.
                            <br>
                            У нас действует система лояльности: <br>
                            - скидки по  накопительным картам «Любимый клиент»<br>
                            - скидки матерям одиночкам 5%<br>
                            - скидки медработникам 7%<br>
                            - скидки  пенсионерам 7%<br>
                            - скидки  детям инвалидам 10%<br>
                            - скидки многодетным семьям 10%

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




-->




    <section class="about-sec text-center" data-stellar-background-ratio="0.3">
        <div class="container">
            <h1>Наш центр</h1>



            <div class="row text-center" id="counters">
                <div class="col-md-3">
                    <div class="counter">
                        <span class="quantity-counter1 highlight">109 675</span>
                        <h6 class="counter-details">Посетителей</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter">
                        <span class="quantity-counter2 highlight">346</span>
                        <h6 class="counter-details">Сотрудников</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter">
                        <span class="quantity-counter3 highlight">71</span>
                        <h6 class="counter-details">Кабинет</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter">
                        <span class="quantity-counter4 highlight">20</span>
                        <h6 class="counter-details">Наград</h6>
                    </div>
                </div>
            </div>

        </div>
    </section>






@endsection
