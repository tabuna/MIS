@extends('sokzn48ru/ALTheader')

@section('title', $Shares['title'])
@section('description', $Shares['descript'])
@section('keywords', $Shares['tag'])
@section('avatar', $Shares['avatar'])

@section('content')

    <div id="wrapper-content">
        <section class="page-title-wrapper">
            <div class="container clearfix">
                <div class="luchiki-heading"><h2>{{$Shares['name']}}</h2>
                </div>
            </div>
            <div class="wrrr"></div>
        </section>
        <main role="main" class="site-content">
            <div class="page type-page status-publish hentry">
                <div class="entry-content">
                    <div class="container">
                        <div class="vc_row wpb_row vc_row-fluid bg-content-box luchiki-margin-top-35 bg-while">
                            <div class="about-us-padding wpb_column vc_column_container vc_col-sm-12">
                                <ul class="breadcrumb">
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="/shares/">Акции</a></li>
                                    <li>{{$Shares->name}}</li>
                                </ul>
                                <div class="wpb_wrapper">

                                    {!! $Shares['content'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
