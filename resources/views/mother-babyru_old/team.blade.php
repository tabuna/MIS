@extends('mother-babyru/header')

@section('content')


    <div class="sub-page-content">


        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Главная</a> <span class="divider"></span></li>
                <li class="active">Специалисты</li>
            </ul>
            <h2 class="light bordered main-title">Наши <span> Специалисты</span></h2>
            <div class="btn-group " role="group" aria-label="...">
                <a href="/team" type="button" class="btn btn-info">Все <span class="glyphicon glyphicon-info-sign"></span> </a>
                @foreach($SpCat as $spec)

                    <a href="/team?catspec={{$spec['id']}}" type="button" class="btn btn-info">{{$spec['name']}}</a>


                @endforeach
            </div>
            <div class="row">


                @foreach($Specialisty as $spec)
                    <div class="col-md-6 padding-bottom-60 clearfix">
                        <div class="doctors-img"><img src="{{$spec->avatar}}" width="234" alt="" title="">
                            <ul class="list-unstyled social2">
                                <li><a href="#." class="fb"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#." class="twitter"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#." class="twitter"><i class="fa fa-vk"></i></a></li>
                                <li><a href="#." class="odnok"><i class="fa fa-circle-o"></i></a></li>
                            </ul>
                        </div>
                        <div class="doctors-detail">
                            <h4>{{$spec->fio}}<span class="text-center">{{$spec->subname}}</span></h4>

                            <p><label class="heading">Специализация: </label><label
                                        class="detail">{{$spec->special}}</label>
                            </p>

                            

                            <p><label class="heading">Должность: </label><label class="detail">{{$spec->opyt}} </label></p>

                            <p><label class="heading">Умения:</label><label class="detail">{{$spec->about}} </label></p>


                        </div>
                    </div>

                @endforeach



            </div>


            <div class="row">
                {!! $Specialisty->render() !!}
            </div>


        </div>


    </div><!--end sub-page-content-->





@endsection

<style>
    .btn-group {
        margin:30px 0;
        margin-bottom: 60px;
    }
</style>