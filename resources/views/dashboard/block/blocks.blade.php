
@extends('app')

@section('content')
        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3"> Список блоков</h1>
        </div>
        <div class="wrapper-md">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Блоки
                    <a href="{{URL::route('dashboard.block.create')}}" class="btn btn-success btn-xs pull-right">Добавить <i class="fa fa-plus"></i></a>
                </div>
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped m-b-none dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row">
                                        <th>#</th>
                                        <th>Имя</th>
                                        <th>Заголовок</th>
                                        <th>Последнее редактирование</th>
                                        <th>Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td class="pull-right">
                                                <a href="{{URL::route('dashboard.block_items',$item->id)}}" class="btn btn-success"><span class="fa fa-list"></span> </a>
                                                <a href="{{URL::route('dashboard.block.edit',$item->id)}}" class="btn btn-primary"><span class="fa fa-edit"></span> </a>
                                                <a href="#"></a>
                                                <form action="{{URL::route('dashboard.block.destroy',$item->id)}}" method="post" class="pull-right">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <small class="text-muted inline m-t-sm m-b-sm">Всего элементов: {!! $items->count() !!}</small>
                            </div>
                            <div class="col-sm-6 text-right text-center-xs">
                                {!! $items->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
