@extends('medicalsystemtk/header')

@section('content')


    <div class="sub-page-content">


        <div class="container">
            <h2 class="light bordered main-title">Наши <span> Специалисты</span></h2>





            <div class="row relative">


                    <input type="checkbox" name="" id="nav-trigger">
                    <label for="nav-trigger"><i class="fa fa-bars"></i></label>

                <div class="col-sm-4 col-xs-12 col-md-3 of-canvas-xs">

                    <nav class="primary-albums clearfix">
                        <div class="list-group">
                            <a style="z-index: 99" href="/team" class="list-group-item @if(!isset($id))active @endif">Все</a>
                            @foreach($SpCat as $album)

                                <a class="list-group-item @if(isset($id) && $id==$album->id)active @endif" href="/team?catspec={{$album['id']}}">{{$album->name}}</a>
                            @endforeach

                        </div>
                    </nav>
                </div>

                <div class="col-sm-8 font-size-0">
                    @foreach($Specialisty as $spec)
                        <div class="col-md-6 padding-bottom-60 display-inline-block vertical-align-top float-none">
                            <div class="doctors-img">
                                <img src="{{$spec->avatar or ''}}" width="234" alt="" title="">
                            </div>
                            <div class="doctors-detail">
                                <h4>{{$spec->fio or ''}}<span class="text-center">{{$spec->subname or ''}}</span></h4>


                                @if(empty(!$spec->special))
                                    <p><label class="heading">Специализация: </label><label
                                                class="detail">{{$spec->special or ''}}</label>
                                    </p>
                                @endif

                                @if(empty(!$spec->obrazovanie))
                                    <p><label class="heading">Образование</label><label
                                                class="detail">{{$spec->obrazovanie or ''}}</label></p>
                                @endif


                                @if(empty(!$spec->opyt))
                                    <p><label class="heading">Должность: </label><label
                                                class="detail">{{$spec->opyt or ''}} </label></p>
                                @endif


                                @if(empty(!$spec->about))
                                    <p><label class="heading">Умения:</label><label
                                                class="detail">{{$spec->about or ''}} </label></p>
                                @endif

                            </div>
                        </div>

                    @endforeach
                </div>



            </div>


            <div class="row text-center">
                {!! $Specialisty->appends(\Input::except('page'))->render() !!}
            </div>


        </div>


    </div><!--end sub-page-content-->





@endsection

<style>
    .btn-group {
        margin: 30px 0;
        margin-bottom: 60px;
    }
</style>