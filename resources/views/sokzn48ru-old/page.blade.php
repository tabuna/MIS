@extends('sokzn48ru.app')


@section('content')



    <section class="well page-bg well-lg blog-bg text-white m-b-none">
        <div class="container text-center text-middle">
            <div class="lead">
                <h1>
                    {{$Page->name}}
                   семейный оздоровительный комплекс
                </h1>
            </div>
        </div>
    </section>



<section class="container">


    <div class="wrapper-md">
        <div class="row">
            <div class="col-sm-9">
                <div class="blog-post">
                    <div class="panel">
                        <div class="wrapper-lg">

                            <div>{!! $Page->content !!}</div>

                            <div class="line line-lg b-b b-light"></div>
                            <div class="text-muted">
                                <i class="fa fa-clock-o text-muted"></i> {{$Page->created_at->toDateString()}}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                @if(isset($LastNews))
                    @include('sokzn48ru._layouts.newslsit',['listnews' => $LastNews])
                @endif
            </div>
        </div>
    </div>



</section>




@endsection
