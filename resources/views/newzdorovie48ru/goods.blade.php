@extends('newzdorovie48ru/header')


@section('title', $Good['title'])
@section('description', $Good['descript'])
@section('keywords', $Good['tag'])
@section('avatar', $Good['avatar'])



@section('content')

<!-- Услуга -->
<section class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="app-content-body ">
                <div class="col-sm-4">
                    <div class="procedures">
                        <div class="page-header">
                            <h3 class="h1 font-thin m-b"><span class="h3">{{$Category->name}}</span></h3>
                        </div>

                        <div class="side-bar-catalog">
                            <nav class="navmenu navmenu-default" role="navigation">
                                <ul class="nav navmenu-nav">
                                    @if(!empty($complexGoods))
                                        <li class="text-center bg-light" style="padding: 10px 15px;">Комплексные услуги</li>
                                        @foreach($complexGoods as $category)
                                            @include('newzdorovie48ru.category.category', ['category' => $category, 'type' => 'complex'])
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>
                            <br>
                            <nav class="navmenu navmenu-default" role="navigation">
                                <ul class="nav navmenu-nav">
                                    @if(!empty($Goods))
                                        <li class="text-center bg-light" style="padding: 10px 15px;">Услуги</li>
                                        @foreach($Goods->toTree() as $category)
                                            @include('newzdorovie48ru.category.category', $category)
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>

                            <ul class="menu-catalog"></ul>

                            <script>
                                $('.menu-catalog .fa-plus-square').click(function(){
                                    $(this).toggleClass('fa-minus-square');
                                    $(this).next().next().toggleClass('active');
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="page-header">
                        <h1 class="font-thin m-b">{{$Good->name}}</h1>
                    </div>

                    <ol class="breadcrumb">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/service?category={{$Good->category()->first()->id}}">{{$Good->category()->first()->name}}</a></li>
                        @if(!is_null($Good->getParent()->first()))
                            @include('newzdorovie48ru.category.break',['Good' => $Good->getParent()->first()])
                        @endif
                        <li class="active">{{$Good->name}}</li>
                    </ol>


                <div class="panel">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="blog-post">
                                <div class="wrapper-lg">

                                    <div class="row padder-v v-center">
                                        <div class="col-md-6 col-sm-6"><img class="img-responsive img-rounded" alt="" src="{{$Good->avatar}}"></div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="text-center">
                                                <h4>{{$Good->name}}</h4>
                                                <h5>Категория: {{$Good->category()->first()->name}}</h5>
                                                <p class="text-center">
                                                    <a href="/#main-appointments-section" class="btn btn-default btn-void-primary">Заказать</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    @if($Good->attribute != "a:0:{}")
                                        <div class="row padder-v">
                                            <div class="col-md-12">
                                                <h5>Что входит :</h5>

                                                <div class="h6">
                                                    <ul class="list-group">
                                                        @foreach(unserialize($Good->attribute) as  $keyAttr=> $valueAttr)
                                                            @if($keyAttr % 2 == 0)
                                                                <li class="list-group-item"><span class="pull-left">{{$valueAttr}}
                                                                        @else
                                                            </span>:<span class="pull-right">{{ $valueAttr }}</span></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <main>
                                        {!! $Good->text!!}
                                    </main>

                                </div>

                                <div class="line line-lg b-b b-light"></div>
                                <div class="text-muted v-center">
                                    <div class="col-md-6">
                                        <i class="fa fa-clock-o text-muted"></i>  {!! $Good->created_at->toDateString()!!}
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <a onClick='window.open ("http://www.facebook.com/sharer.php?u={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");' class="btn btn-icon"><i class="fa fa-facebook"></i></a>

                                        <a onClick='window.open ("https://twitter.com/share?url={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                                           class="btn btn-icon"><i class="fa fa-twitter"></i></a>

                                        <a onClick='window.open ("https://plus.google.com/share?url={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                                           class="btn btn-icon"><i class="fa fa-google-plus"></i></a>

                                        <a onClick='window.open ("http://vk.com/share.php?url={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                                           class="btn btn-icon"><i class="fa fa-vk"></i></a>

                                        <a onClick='window.open ("http://www.ok.ru/dk?st.cmd=addShare&st.s=1&st._surl={{Request::url()}}","mywindow","menubar=1,resizable=1,width=650,height=550");'
                                           class="btn btn-icon"><i class="fa fa-odnoklassniki"></i></a>
                                    </div>
                                </div>
                                <div class="line line-lg b-b b-light"></div>

                                    <div class="review wrapper-lg" id="comments">
                                        @if(count($Comments))
                                            <h2>Комментарии</h2>
                                            <hr>
                                            <ol class="commentlist">

                                                @foreach($Comments as $comment)
                                                    <div class="m-b b-b padder-v">
                                                        <div>
                                                            <i class="fa fa-user"></i><strong> {{$comment['fio']}}</strong>
                                                              <span class="text-muted text-xs block m-t-xs">
                                                                <time class="pull-right"><i class="fa fa-clock-o"></i>
                                                                    {{$comment['created_at']}}</time>
                                                              </span>
                                                        </div>
                                                        <div class="m-t-sm">
                                                            {{$comment->content}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </ol>

                                            {!! $Comments->render() !!}
                                        @else
                                            <div class="alert alert-success text-center" role="alert">Пока нет комментариев</div>
                                        @endif

                                        <h2 class="m-t-xxl">Оставить комментарий</h2>
                                        <hr>

                                        <form class="form" action="/service" method="post">
                                            <div class="form-group">
                                            <input type="text" name="fio" max="255" class="form-control rounded" required placeholder="Имя">
                                                </div>
                                            <div class="form-group">
                                            <input type="email" name="email" required  class="form-control rounded" placeholder="Email адрес">
                                                </div>
                                            <div class="form-group">
                                            <input type="integer" name="phone" required  class="form-control rounded" placeholder="Номер телефона">
                                                </div>
                                            <div class="form-group">
                                            <textarea rows="4" name="comment" required   class="form-control rounded" placeholder="Комментарий"></textarea>
                                                </div>
                                            <input type="hidden" name="goods" value="{{$Good->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-default btn-void-primary">Добавить отзыв</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Услуга -->







@endsection
