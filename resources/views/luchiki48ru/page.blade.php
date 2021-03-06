@extends('luchiki48ru/header')

@section('title', $Page['title'])
@section('description', $Page['descript'])
@section('keywords', $Page['tag'])
@section('avatar', $Page['avatar'])

@section('content')
<div class="page-content">
    <div class="container">
        <h1 class="blueText center">{{$Page['name']}}</h1>
        <div class="page-text padding-top-35">
            <ul class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li>{{$Page->name}}</li>
            </ul>
            {!! $Page['content'] !!}
        </div>
    </div>

</div>
@endsection
