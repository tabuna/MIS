@extends('sokzn48ru/ALTheader')

@section('content')

    <div id="wrapper-content">
        <section class="page-title-wrapper">
            <div class="container clearfix">
                <div class="luchiki-heading">
                    <h2>Услуги</h2>
                </div>
            </div>
            <div class="wrrr"></div>
        </section>
        <main role="main" class="luchiki-margin-top-35">
            <div class="container clearfix">
                <div class="blog-wrapper">
                    <div class="clearfix">
                        <article id="post-">
                            <div class="about-us-padding">
                                <ul class="breadcrumb">
                                    <li><a href="/">Главная</a></li>
                                    <li>Услуги</li>

                                </ul>
                                <div class="row">
                                    <div class="gallery-wrapper gallery-infinite-scroll">

                                        @foreach($data as $key=>$item)

                                            <div id="cat-{{$key}}" class="col-xs-12 service-wrapper">
                                                <h2>{{$item->name}}</h2>


                                                @foreach($item->goods as $key => $good)
                                                    <div class="gallery-item gallery-col-3 service-img">
                                                        <div class="entry-thumbnail title">
                                                            <img src="{{$good->avatar}}" alt="{{$good->name}}">



                                                            <!--Описание фотоальбома-->
                                                            <div class="entry-thumbnail-hover">
                                                                <div class="entry-hover-wrapper">
                                                                    <div class="entry-hover-inner">
                                                                        <a href="/service/{{$good->id}}" title="{{$good->name}}">
                                                                            <h5 class="class-name">{{$good->name}}</h5>
                                                                            <span class="excerpt">
                                                                                {{str_limit((strip_tags($good->content)), 130, '...')}}
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--Описание фотоальбома-->
                                                        </div>
                                                    </div>


                                                @endforeach


                                            </div>


                                        @endforeach
                                        </div>
                                </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
    </div>


@endsection
