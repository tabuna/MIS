@extends('gkzn48ru/headerALT')


@section('headerTitle','Энциклопедия вашего здоровья')


@section('content')




    <div class="all_departaments">
        <div class="container xsx-width">
            <div class="row">
                <!-- ===== Begin Triggers List ===== -->
                <aside class="col-md-3 allD">



                    <div id="text-6" class="widget widget-widget_text">
                        <div class="textwidget">
                            <div class="widget widget-form-white-short">
                                <div class="forM">

                                    <form method="get" action="/encypost">
                                        <input type="text" class="form-control " name="search" placeholder="Поиск...">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


                    <ul>


                        @foreach($MainElementMenu as $mainElement)
                            <li>
                                <a data-toggle="collapse" data-parent="#accordion3" href="#collapse{{$mainElement->id}}">
                                    <i class="fa fa-angle-right"></i> {{$mainElement->name}}
                                </a>
                            </li>

                            <div id="collapse{{$mainElement->id}}" class="panel-collapse collapse">

                                    @foreach($mainElement->subCategory()->get() as $subMenu)

                                       <p class="text-center">
                                           <a href="/medencyclopedia/{{$subMenu->id}}">{{$subMenu->name}}</a>
                                        </p>
                                    @endforeach


                            </div>
                        @endforeach



                    </ul>

                    <div class="sidebar-widget clearfix">
                        <h2 class="bordered light">Алфавитный указатель</h2>
                        <ul class="archives">
                            @foreach($Index as $bukva)
                                <li><a href="/encypost?index={{$bukva->name}}"><i class="fa fa-long-arrow-right"></i>{{$bukva->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>




                </aside>
                <!-- ===== End Triggers List ===== -->

                <!-- ===== Begin All Sections ===== -->
                <div class="col-md-9">
                    <div class="all_dp_elements">
                        <!--
                        <div class="caption_all_dp">
                            <h3>Тут будут человечки</h3>
                            <p>Etiam rhoncus nisi quis magna posuere, non tincidunt sem mattis. Nulla ftacilisi. Proin ornare ac leo et mattis. Nulla id augue arcu. Suspendisse consectetur pretium nulla quis lacinia. Vestibulum eu tortor id neque varius iaculis. Mauris malesuada consequat auctor. Nam eget elementum justo, non aliquet dui. Maecenas vel nulla lacus.</p>
                            <img src="http://eko-zdrav.ru/ochishenie/images/308.jpg" class="img-responsive">
                        </div>
                        -->



                            <!-- ================================ -->
                            <!-- ========== Begin Blog Style ========== -->
                            <!-- ================================ -->
                            <div class="blogMasonry">

                                <div class="col-xs-12">
                                    <div class="heading_e"><h3>Последние статьи</h3>

                                        <p>Тут можно тоже что то написать для превлечения внимания</p><h4><img src="/gkzn48ru/wp-content/themes/assets/img/heading.png" alt="heading"></h4>
                                    </div>
                                </div>


                                <div class="xsx-width v-s">
                                    <div class="alternate-divs">


                                        <!-- ===== Begin Blog blocks ===== -->

                                        <!-- ===== Begin Thumbnails ===== -->

                                        @foreach($LastNews as $post)


                                            <div class="v-p-3 col-md-4">


                                                <div class="elements_news_c">
                                                    <div class="thumbnail news_c">
                                                        <img width="" height=""
                                                             src="{{$post->avatar}}"
                                                             class="attachment-blog_masonery wp-post-image" alt="Dental checkup"/></div>
                                                    <div class="caption_news_c news_1">
                                                        <div class="icon">
                                                            <div class="icon-1">
                                                                <i class="fa fa-phone fa-lg"></i>
                                                            </div>
                                                            <div class="icon-2">
                                                                <!-- ===== You can change the icon just below ===== -->
                                                                <i class="fa fa-pencil fa-lg"></i>
                                                            </div>
                                                        </div>
                                                        <h4><a href="/encypost/{{$post->id}}">{{$post->name}}</a></h4>

                                                        <p> {{str_limit((strip_tags($post->opisanie)), $limit = 100, $end = '...')}}</p>

                                                    </div>
                                                </div>

                                            </div>
                                            @endforeach



                                                    <!-- ===== End Thumbnails ===== -->



                                            <!-- ===== End Blog blocks ===== -->
                                    </div>

                                </div>
                            </div>
                            <!-- ================================ -->
                            <!-- ========== End Blog Style ========== -->
                            <!-- ================================ -->









                    </div>


                </div>
                <!-- ===== End All Sections ===== -->
            </div>
        </div>
    </div>











@endsection
