
@extends('app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Меню сайта
            <small><a href="/dashboard/menu/add">Добавить новую</a></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Дерево</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Menu as $li)
                                <tr>
                                    <td>{{ $li->id }}</td>
                                    <td>{{ $li->name }}</td>


                                @forelse(//Menu::find($li->id)->MenuElement()->get as $sub)
                                    <li>{{ //$sub->name }}</li>
                                @empty
                                    <p>No users</p>
                                @endforelse


                                        <td>
                                        <a href="/dashboard/news/add/{{ $li->id }}" class="btn btn-primary"><span class="fa fa-plus"></span> </a>
                                        <a href="/dashboard/news/add/{{ $li->id }}" class="btn btn-primary"><span class="fa fa-edit"></span> </a>
                                        <a href="/dashboard/news/destroy/{{ $li->id }}" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Управление</th>
                            </tr>
                            </tfoot>

                        </table>
                        {!! $Menu->render() !!}




                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection
