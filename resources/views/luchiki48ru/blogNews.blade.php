@extends('cozn48ru/header')
@section('content')
    <div class="page-content">
        <div class="container">
            <h1>{{$New['name']}}</h1>
            <div class="page-text">
                {!! $New['content'] !!}
            </div>
        </div>
    </div>
@endsection