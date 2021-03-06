@extends('app')

@section('content')


            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">Новый блок</h1>
            </div>
            <div class="wrapper-md">
                <form class="row" role="form" action="{{URL::route('dashboard.block.update',$Block->id)}}" method="post">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading font-bold">Содержание</div>
                            <div class="panel-body">

                                    <textarea class="textarea textareaedit form-control" name="cont" rows="30">
                                        {!! $Block->cont or '' !!}
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
                                    <input class="form-control" type="text" maxlength="255" name="title" value="{{ old('title', $Block->title)}}">
                                </div>

                                <div class="form-group">
                                    <label>Имя</label>
                                    <input class="form-control" type="text" maxlength="255" required name="name" value="{{$Block->name or ''}}">
                                </div>

                                <div class="form-group">
                                    <label>Идентификатор</label>
                                    <input class="form-control" type="text" maxlength="255" required name="slug" value="{{$Block->slug or ''}}">
                                </div>

                                <div class="form-group">
                                    <label>Описание</label>

                                    <textarea class="form-control" rows="7"  maxlength="255" name="descript">{{$Block->descript or ''}}</textarea>
                                </div>

                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>

@endsection
