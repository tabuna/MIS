
@extends('app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Категории
        </h1>

        {!! Breadcrumbs::render('category') !!}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <h5 class="box-title">
                                    <a href="/dashboard/category/" class="btn btn-link btn-sm"><span class="fa fa-check"></span> Активные </a>
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
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Category as $Cat)
                                <tr>
                                    <td>{{ $Cat->id }}</td>
                                    <td><img src="{{ $Cat->avatar }}" class="img-responsive" width="100px" height="50px"></td>
                                    <td>{{ $Cat->name }}</td>
                                    <td>
                                        <a href="/dashboard/category/restore/{{ $Cat->id }}" class="btn btn-success"><span class="fa fa-reply"></span> </a>
                                        <a href="/dashboard/category/unset/{{ $Cat->id }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Миниатюра</th>
                                <th>Имя</th>
                                <th>Управление</th>
                            </tr>
                            </tfoot>

                        </table>
                        {!! $Category->render() !!}
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
