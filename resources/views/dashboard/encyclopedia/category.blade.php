@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Разделы</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <a href="/dashboard/encyclopediaCategory/create" class="btn btn-link btn-sm"><span class="fa fa-plus"></span> Добавить</a>

            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Заголовок</th>
                                    <th>Родительская категория</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($EncyCategory as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->mainCategory()->name or 'Главная категория'}}</td>
                                        <td class="btn-toolbar">
                                            <div class="btn-group">
                                                <a href="/dashboard/encyclopediaCategory/{{ $category->id }}/edit" class="btn btn-primary"><span class="fa fa-edit"></span> </a>
                                                <form action="/dashboard/encyclopediaCategory/{{ $category->id }}" method="post" class="pull-right">
                                                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">Всего элементов: {!! $EncyCategory->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $EncyCategory->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection






