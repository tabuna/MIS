@extends('cozn48ru/header')

@section('title', $New['title'])
@section('description', $New['descript'])
@section('keywords', $New['tag'])
@section('avatar', $New['avatar'])

@section('content')
    <div class="page-content">
        <div class="container">
            <h1>{{$New['name']}}</h1>
            <ul class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li><a href="/blog/">Новости</a></li>
                <li>{{$New->name}}</li>
            </ul>
            <div class="page-text">
                {!! $New['content'] !!}
            </div>
        </div>
    </div>
    <div class="skidki">
        <br>

        <h2>СКИДКИ И АКЦИИ</h2>

        <div class="sk">
            <div class="container">
                @foreach(sharesOnMain::getShare(6,3) as $item)

                    <div class="sk1 col-xs-12 col-md-12 col-sm-12 col-lg-4">
                        <a href="/shares/{{$item['id']}}">
                            <img src="{{$item['avatar']}}" alt="{{$item['name']}}">
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
        <br>
    </div>
@endsection
