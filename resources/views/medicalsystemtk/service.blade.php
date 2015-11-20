@extends('medicalsystemtk/header')

@section('content')
    <section class="sub-page-banner text-center hidden-xs">
        <div class="overlay"></div>
        <div class="container">
            <h1 class="entry-title">Наши услуги</h1>
            <p>Описание услуг оказываемых центром "Здоровье Нации"</p>
        </div>
    </section>

    <div class="sub-page-content">

        <div class="container">
            <div class="row">

                <aside class="col-md-4">

                    <div class="sidebar-widget clearfix">

                        <!--<h2 class="bordered light">Категории</h2>-->
                        <div class="procedures">
                            <h3>Разделы</h3>


                            <div class="panel-group sidebar-nav" id="accordion3">
                                @foreach($Goods->toTree() as $category)
                                    @include('medicalsystemtk.category.category', $category)
                                @endforeach

                            </div>
                        </div>

                    </div>





                    <style>
                        .plus-service:hover {
                            color:#2B96CF;
                            -webkit-transition: all .5s;
                            transition: all .5s;
                        }
                        .panel-sidebar a {
                            position: relative;
                            display: inline-block;
                        }
                        .panel-heading a:after {
                            position: absolute;
                            left: 0;
                            content: "";
                            display: block;
                            width: 0%;
                            margin-right: 10px;
                            border-bottom: 1px #373737 solid;

                        }
                        .panel-heading a:hover:after {
                            width: 100%;
                            border-bottom-width: 1px;
                            transition: all .5s ease-out;
                        }
                        .panel-collapse a {
                             transition: all .5s ease-out;
                        }
                        .panel-collapse a:hover {
                            background-color: white;
                        }
                    </style>

                    <script>
                        $('.plus-service').on('click',function(){
                            var allPlus = $('.plus-service');
                            allPlus.removeClass('fa-minus-square').addClass('fa-plus-square');
                            var its = $(this);
                            if(its.parent().parent().next().hasClass('in'))
                            {

                                its.addClass('fa-plus-square').removeClass('fa-minus-square');
                            }
                            else
                            {
                                its.addClass('fa-minus-square').removeClass('fa-plus-square');
                            }
                        });
                    </script>







                </aside>

                <div class="col-md-8">
                    <h2 class="bordered light">
                        @foreach($thisCategory as $item)
                            {{$item['name']}}
                        @endforeach
                    </h2>
                    <div class="products">

                        <div class="category-text">
                            @foreach($thisCategory as $item)
                                {!! $item['text'] !!}
                            @endforeach
                        </div>
                        <!--@foreach($Goods as $good)

                        <div class="product">
                            <div class="product-thumb">
                                <a href="/service/{{$good['id']}}"><img alt="" src="{{$good['avatar']}}" height="100px"></a>
                            </div>
                            <h4>{{$good['name']}}</h4>

                            <div class="price-rating">
                                <p class="price"><i class="fa fa-rub"></i> {{$good['price']}}</p>
                                <div class="clearfix"></div>
                            </div>
                            <span class="sperator"></span>
                            <a class="ad-to-cart" href="/service/{{$good['id']}}"><i class="fa fa-hospital-o"></i>Подробнее</a>
                        </div>

                        @endforeach-->

                    </div>

                    <!--<div class="clearfix text-center">


                    </div>-->

                </div>

            </div>
        </div>
            <div class="sidebar-widget light container">
                <h2 class="bordered light">Последние новости</h2>

                @foreach($LastNews as $lastNew)
                    <article style="overflow: hidden" class="popular-post col-xs-12">
                        <img style="width: 170px" alt="{{$lastNew->title}}" src="{{$lastNew->avatar}}">
                        <h4><a href="/blog/{{$lastNew->id}}">{{$lastNew->name}}</a></h4>

                        <p class="text-justify">{{ substr(strip_tags($lastNew->content), 0, 201) }} ...</p>

                        <p class="popular-date text-right">{{$lastNew->created_at}}</p>
                    </article>
                @endforeach
            </div>
    </div>



@endsection