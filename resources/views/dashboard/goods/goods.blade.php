@extends('app')

@section('content')


    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3"> Список Услуг</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="/dashboard/goods/add/" class="btn btn-link btn-sm"><span class="fa fa-plus"></span> Добавить новую запись </a>


            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Миниатюра</th>
                                    <th>Имя</th>
                                    <th>Категория</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($Goods as $good)
                                    <tr>
                                        <td>{{ $good->id }}</td>
                                        <td><img src="{{ $good->avatar }}" class="img-responsive" width="100px" height="50px"></td>
                                        <td>{{ $good->name }}</td>
                                        <td>{{ $good->category()->first()->name or '' }}</td>
                                        <td>
                                            <a href="/dashboard/goods/add/{{ $good->id }}" class="btn btn-primary"><span class="fa fa-edit"></span> </a>
                                            <a href="/dashboard/goods/destroy/{{ $good->id }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">Всего элементов: {!! $Goods->count() !!}</small>
                        </div>
                        <div class="col-sm-6 text-right text-center-xs">
                            {!! $Goods->render() !!}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
