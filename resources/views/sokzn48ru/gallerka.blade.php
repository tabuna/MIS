@extends('sokzn48ru/ALTheader')
@section('title', $album['name'])
@section('description', $album['descript'])
@section('keywords', $album['tag'])
@section('avatar', $album['avatar'])

@section('content')

    <div id="wrapper-content">
        <section class="page-title-wrapper">
            <div class="container clearfix">
                <div class="luchiki-heading">
                    <h2>{{$album->name}}</h2>
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

                                    <li><a href="/gallery/">Галерея</a></li>
                                    <li>{{$album->name}}</li>
                                </ul>
                                <div class="row">
                                    <div class="gallery-wrapper gallery-infinite-scroll">



                                            <div class="col-xs-12 service-wrapper">


                                        @forelse($photos as $photo)

                                            <div class="gallery-item gallery-col-3 service-img">
                                                <div class="entry-thumbnail title">
                                                    <img src="{{$photo['url']}}">

                                                    <!--Описание фотоальбома-->
                                                    <div class="entry-thumbnail-hover">
                                                        <div class="entry-hover-wrapper">
                                                            <div class="entry-hover-inner">
                                                                <a href="{{$photo['url']}}" class="fancybox" rel="gallery{{$photo['album_id']}}">
                                                                    <h4 class="class-name">Посмотреть</h4>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Описание фотоальбома-->
                                                </div>
                                            </div>
                                        @empty
                                            <p>Нет фотографий</p>
                                        @endforelse



                                            </div>

                                    </div>
                                </div>
                                {!! $photos->render() !!}
                            </div>
                        </article>
                    </div>
                </div>


            </div>
        </main>
    </div>


@endsection
