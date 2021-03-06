@extends('luchiki48ru/header')
@section('content')
    <div class="page-content">
        <div class="container">
            <h1 class="blueText center"> Полезные статьи</h1>
            <div class="page-text padding-top-35">
                <ul class="breadcrumb">
                    <li><a href="/">Главная</a></li>

                    <li>Полезные статьи</li>
                </ul>
                <div class="row newsList">
                    @foreach($Articles as $item)
                        <div class="col-md-4 item-row ">
                            <div class="item-blog">
                                <a href="/articles/{{$item->id}}" title="{{$item['name']}}">
                                    <img src="{{$item->avatar}}" class="img-full" alt="{{$item['name']}}">
                                </a>
                                <div>
                                    <h3><a href="/articles/{{$item['id']}}">{{str_limit((strip_tags($item['name'])), $limit = 80, $end = '...')}}</a></h3>
                                    <p class="day">{{$item['created_at']}}</p>
                                    <div>{{str_limit((strip_tags($item['content'])), $limit = 130, $end = '...')}}</div>

                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            {!! $Articles->render() !!}
        </div>

    </div>
    <script src="/luchiki48.ru/js/articles_height.js"></script>
@endsection
