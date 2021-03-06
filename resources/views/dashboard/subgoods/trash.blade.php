
@extends('app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Подуслуги
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <h5 class="box-title">
                                <a href="/dashboard/subgoods/" class="btn btn-link btn-sm"><span class="fa fa-check"></span> Активные </a>
                            </h5>
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Миниатюра</th>
                                <th>Имя</th>
                                <th>Услуга</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($SubGoods as $good)
                                <tr>
                                    <td>{{ $good->id }}</td>
                                    <td><img src="{{ $good->avatar }}" class="img-responsive" width="100px" height="50px"></td>
                                    <td>{{ $good->name }}</td>
                                    <td>{!! $good->getParent()->first()->name  or 'Услуга удалена <br><small> Для востановления записи необходимо востановить её родителя </small>' !!}</td>
                                    <td>
                                        @if(isset($good->getParent()->first()->name))
                                        <a href="/dashboard/subgoods/restore/{{ $good->id }}" class="btn btn-success"><span class="fa fa-reply"></span> </a>
                                        @endif
                                        <a href="/dashboard/subgoods/unset/{{ $good->id }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Миниатюра</th>
                                <th>Имя</th>
                                <th>Услуга</th>
                                <th>Управление</th>
                            </tr>
                            </tfoot>

                        </table>
                        {!! $SubGoods->render() !!}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
