@extends('app')

@section('content')


            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">Новая страница</h1>
            </div>
            <div class="wrapper-md">
                <form class="row" role="form" action="{{URL::route('dashboard.page.update',$Page->id)}}" method="post">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading font-bold">Содержание</div>
                            <div class="panel-body">

                                    <textarea class="textarea textareaedit form-control" name="content" rows="30">
                                        {!! $Page->content or '' !!}
                                    </textarea>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading font-bold">Общая информация</div>
                            <div class="panel-body">


                                <div class="form-group">
                                    <label>Заголовок</label>
                                    <input class="form-control" type="text" maxlength="255" required name="title" value="{{$Page->title or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Имя</label>
                                    <input class="form-control" type="text" maxlength="255" required name="name" value="{{$Page->name or ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Теги</label>
                                    <input ui-jq="tagsinput" ui-options="" class="form-control w-md" data-role="tagsinput" type="text" maxlength="255"
                                           required name="tag" value="{{$Page->tag or ''}}">
                                </div>

                                <div class="form-group">
                                    <label>Описание</label>

                                    <textarea class="form-control" rows="7"  maxlength="255" required name="descript">{{$Page->descript or ''}}</textarea>
                                </div>
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary">Отправить</button>


                            </div>
                        </div>
                    </form>
                </div>

@endsection
