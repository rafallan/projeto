@extends('painel.templates.template')

@section('content-header')
    <section class="content-header">
        <h1>
            Blog
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Disciplinas</li>
        </ol>
    </section>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Disciplinas ({{ $disciplinas->total() }})
                        <a href="{{ route('disciplinas.create') }}" class="pull-right"><span
                                    class="fa fa-plus-circle"></span></a>
                    </h3>

                    <div>

                        <form class="form-inline" method="get"
                              action="{{ route('disciplinas.index')}}">
                            <div class="form-group">
                                {{ Form::text('q',old('q'), ['class' => 'form-control','size' => '50','placeholder' => 'Pesquisar....']) }} {!! $errors->first('q') !!}
                            </div>

                            <button type="submit" class="btn btn-warning"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></button>
                            <a href="{{ route('disciplinas.index')}}"
                               class="btn btn-primary">Listar Todas</a>
                        </form>

                    </div>
                    <br>

                    @if(Session('mensagem'))
                        {!! Session('mensagem') !!}
                    @endif

                </div><!-- box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>

                                <th class="text-center">ID</th>
                                <th class="text-center">Curso / Nome</th>
                                <th class="text-center">Descrição</th>

                                <th class="text-center" colspan="2" width="10%">Ações</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($disciplinas as $disciplina)
                                <tr>
                                    <td class="text-center">{{ $disciplina->id }}</td>
                                    <td class="text-center">{{ $disciplina->curso->nome }} / {{ $disciplina->nome }}</td>
                                    <td class="text-center">{!! $disciplina->descricao !!}</td>

                                    <td class="text-center">
                                        <a href="{{ route('disciplinas.edit',$disciplina->id) }}"
                                           class="btn-primary btn btn-xs"
                                           title="Editar"><i class="fa fa-fw fa-edit"></i></a>
                                    </td>

                                    <td class="text-center">
                                        {!! Form::open(['method' => 'delete', 'route' => ['disciplinas.destroy', $disciplina->id] ]) !!}

                                        <button type="submit" value="Excluir" class="btn btn-danger btn-xs"
                                                onclick="return confirm('Você deseja excluir a Disciplina?')">
                                            <i class="fa fa-fw fa-trash-o"></i></button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- box-body -->
                <div class="box-footer">
                    <div class="pagination pagination-sm no-margin pull-right">
                        {{ $paginacao }}
                    </div>
                </div><!-- box-footer -->
            </div><!-- box -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->

@endsection